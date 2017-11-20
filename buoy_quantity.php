<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);





/*

API key
6e2e7c7b6be30098213826d0d92bc7f8

API secret key
0c2fed47bbe0400a44cdfb0393d1e8be

ЗАПРОС URL
https://the-buoy-company.myshopify.com/admin/oauth/authorize?client_id=6e2e7c7b6be30098213826d0d92bc7f8&scope=read_products,write_products&redirect_uri=https://l-portfolio-l.com/buoy_quantity.php&state=buoy8


Полученный URL
https://l-portfolio-l.com/buoy_quantity.php?code=ebd3f79c555a4e715430e388288f5738&hmac=b246f6c71bfe7b5cb5cf1db3e103a772438839d3df3860a51efaf592835b2e47&shop=the-buoy-company.myshopify.com&state=buoy8&timestamp=1510530243
*/



require 'vendor/autoload.php';

  $shopUrl = 'the-buoy-company.myshopify.com';
  $accessToken = 'dd19d0caebf2fe752bb1cbbbc4bdb1c8';

$client = new \Shopify\Client([
   //"account_token" => $account_token,
   "shopUrl" => $shopUrl,
   "X-Shopify-Access-Token" => $accessToken
]);



    



//$client->updateProductVariant (["id" => "47187714122", "variant" => ["inventory_quantity" => 10]   ]);
//$client->updateProductVariant (["id" => "47187714122", "variant" => ["inventory_quantity_adjustment" => 10]   ]);



$arr = $client->getProducts([ 'collection_id' => 12451807255, 'limit' => 250 ]);



  for ($i = 0; $i < count($arr['products']); $i++) 
  { 	
	  for ($q = 0; $q < count($arr['products'][$i]['variants']); $q++) 
	  { 	
		if ( $arr['products'][$i]['variants'][$q]['option1'] == "pay" || $arr['products'][$i]['variants'][$q]['option2'] == "pay" || $arr['products'][$i]['variants'][$q]['option3'] == "pay" ) {
			if ( $arr['products'][$i]['variants'][$q]['inventory_quantity'] != 0  ) {
				$var_num = $arr['products'][$i]['variants'][$q]['inventory_quantity'];
				$var_num_sum = 0 - $var_num;
				$now_ID = $arr['products'][$i]['variants'][$q]['id'];
				
				$client->updateProductVariant (["id" => $now_ID, "variant" => ["inventory_quantity" => 0]   ]);

				$var_ID = $client->getProduct(["id" => $arr['products'][$i]['variants'][$q]['product_id'] ]);
				$var_VARIANTS = $var_ID['product']['variants'];
				
				for ($e = 0; $e < count($var_VARIANTS); $e++)  { 	
					if ( $var_VARIANTS[$e]['option1'] == "free" || $var_VARIANTS[$e]['option2'] == "free" || $var_VARIANTS[$e]['option3'] == "free" ) {
						$free_ID = $var_VARIANTS[$e]['id'];
						$client->updateProductVariant (["id" => $free_ID, "variant" => ["inventory_quantity_adjustment" => $var_num]   ]);
					}
				}		
			}
		}
	  } 
  } 
  

?>