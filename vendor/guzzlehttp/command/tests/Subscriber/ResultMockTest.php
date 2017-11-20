<?php
namespace GuzzleHttp\Tests\Subscriber;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Command\Subscriber\ResultMock;
use GuzzleHttp\Message\Request;

/**
 * @covers GuzzleHttp\Command\Subscriber\ResultMock
 */
class ResultMockTest extends \PHPUnit_Framework_TestCase
{
    public function testDescribesSubscribedEvents()
    {
        $mock = new ResultMock();
        $this->assertInternalType('array', $mock->getEvents());
    }

    public function testIsCountable()
    {
        $plugin = (new ResultMock)->addMultiple([
            [],
            new \Exception('foo'),
        ]);
        $this->assertEquals(2, count($plugin));
    }

    public function testCanClearQueue()
    {
        $plugin = new ResultMock();
        $plugin->addResult(['foo' => 'bar']);
        $plugin->clearQueue();
        $this->assertEquals(0, count($plugin));
    }

    public function testCanMockCommandResults()
    {
        $client = $this->getMockBuilder('GuzzleHttp\\Command\\AbstractClient')
            ->setConstructorArgs([new Client])
            ->getMockForAbstractClass();

        $request = new Request('GET', 'http://foo.com');
        $trans = new CommandTransaction($client, new Command('foo'));
        $trans->request = $request;
        $e1 = new \Exception('Foo');
        $e2 = new \Exception('Bar');

        $plugin = (new ResultMock)
            ->addResult(['foo' => 'bar'])
            ->addException($e1)
            ->addException($e2);

        // 1. The Model object
        $event = new PreparedEvent($trans);
        $plugin->onPrepared($event);
        $this->assertEquals(['foo' => 'bar'], $event->getResult());

        // 2. The Exception with "Foo"
        try {
            $plugin->onPrepared(new PreparedEvent($trans));
        } catch (\Exception $e) {
            $this->assertEquals('Foo', $e->getMessage());
        }

        // 2. The Exception with "Bar"
        try {
            $plugin->onPrepared(new PreparedEvent($trans));
        } catch (\Exception $e) {
            $this->assertEquals('Bar', $e->getMessage());
        }
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testUpdateThrowsExceptionWhenEmpty()
    {
        $client = $this->getMockBuilder('GuzzleHttp\\Command\\AbstractClient')
            ->setConstructorArgs([new Client])
            ->getMockForAbstractClass();
        $request = new Request('GET', 'http://foo.com');
        $trans = new CommandTransaction($client, new Command('foo'));
        $trans->request = $request;
        $event = new PreparedEvent($trans);
        (new ResultMock)->onPrepared($event);
    }
}
