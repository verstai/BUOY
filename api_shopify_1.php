<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

  //Modify these
  $API_KEY = 'd4c51da48f75d232945c1430dd6ab2f7';
  $SECRET = '133c23380052e9d62523d70253d8c886';
  $TOKEN = '3577f896bb3f92e9ea16b1468deb20a6';
  $STORE_URL = 'testshopll.myshopify.com';
  
  
  
  
echo '<p>Hello world</p>'; 
  
  
require 'vendor/autoload.php';


echo '<p>Hello world</p>';


 
$shopUrl = 'testshopll.myshopify.com';
$accessToken = 'e58b34de554f00a5a59c495c55077b78';

$client = new \Shopify\Client([
   "shopUrl" => $shopUrl,
   "X-Shopify-Access-Token" => $accessToken
]);





$page_num = 1;
$i1 = 0;
while ($i1 < 1) {
	global  $client;
	global  $page_num;

	$arr = $client->getProducts([ 'limit' => 1, 'page' => $page_num  ]);

	if ( count($arr['products']) < 1 ) {
		$i1 = 1; 
	} 
	$page_num++;
	sleep(1);

				echo $i1 . "===================<br/>";
				echo $page_num . "===================<br/><br/><br/>";
	
	
  for ($i = 0; $i < count($arr['products']); $i++) 
  { 	
	  for ($q = 0; $q < count($arr['products'][$i]['variants']); $q++) 
	  { 	
	  
				echo '<pre>'.print_r($arr['products'][$i]['title'], true).'</pre>';
	  
	  
	  
		if ( $arr['products'][$i]['variants'][$q]['option1'] == "pay" || $arr['products'][$i]['variants'][$q]['option2'] == "pay" || $arr['products'][$i]['variants'][$q]['option3'] == "pay" ) {
			if ( $arr['products'][$i]['variants'][$q]['inventory_quantity'] != 0  ) {
				$var_num = $arr['products'][$i]['variants'][$q]['inventory_quantity'];
				$var_num_sum = 0 - $var_num;
				$now_ID = $arr['products'][$i]['variants'][$q]['id'];
				
				
			
				$var_ID = $client->getProduct(["id" => $arr['products'][$i]['variants'][$q]['product_id'] ]);
				$var_VARIANTS = $var_ID['product']['variants'];
				
				for ($e = 0; $e < count($var_VARIANTS); $e++)  { 	
					if ( $var_VARIANTS[$e]['option1'] == "free" || $var_VARIANTS[$e]['option2'] == "free" || $var_VARIANTS[$e]['option3'] == "free" ) {
						$free_ID = $var_VARIANTS[$e]['id'];
						$client->updateProductVariant (["id" => $free_ID, "variant" => ["inventory_quantity_adjustment" => $var_num]   ]);
					}
				}
				echo '<pre>'.print_r($var_VARIANTS, true).'</pre>';

			}
		}
	  } 
  } 
  





//echo '<pre>'.print_r($arr, true).'</pre>';


};



echo '<p>Hello world</p>'; 





echo '<p>Hello world</p>'; 
//echo $client->getProducts(); 

//var_dump( $client->getProducts() );
//print_r( $client->getProducts() );

















?>