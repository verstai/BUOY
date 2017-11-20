<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Operations
    |--------------------------------------------------------------------------
    |
    | This array of operations is translated into methods that complete these
    | requests based on their configuration.
    |
    */

    "operations" => array(

        /**
         *    getCustomerAddresses() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "getCustomerAddresses" => array(
            "httpMethod" => "GET",
            "uri" => "/admin/customers/{id}/addresses.json",
            "summary" => "Retrieve all addresses for a customer",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "id" => array(
                    "type" => "integer",
                    "location" => "uri",
                    "description" => "The ID of the Customer.",
                    "required" => true
                ),
                "limit" => array(
	                "type" => "integer",
	                "location" => "query",
	                "description" => "Amount of results (default: 50) (maximum: 250)"
                ),
                "page" => array(
	             	"type" => "integer",
	             	"location" => "query",
	             	"description" => "Page to show (default: 1)"   
                )
            )
        ),
        
        /**
         *    getCustomerAddress() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "getCustomerAddress" => array(
            "httpMethod" => "GET",
            "uri" => "/admin/customers/{id}/addresses/{addressId}.json",
            "summary" => "Get a count of all articles from a certain blog",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "id" => array(
                    "type" => "integer",
                    "location" => "uri",
                    "description" => "The ID of the Customer.",
                    "required" => true
                ),
                "addressId" => array(
                    "type" => "integer",
                    "location" => "uri",
                    "description" => "The ID of the Address.",
                    "required" => true
                )
            )
        ),


        /**
         *    createCustomerAddress() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "createCustomerAddress" => array(
            "httpMethod" => "POST",
            "uri" => "/admin/customers/{customer_id}/addresses.json",
            "summary" => "Creates a new address for a customer.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "customer_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                ),
                "address" => array(
                    "location" => "json",
                    "parameters" => array(
                        "address1" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "address2" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "city" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "company" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "first_name" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "last_name" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "phone" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "province" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "country" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "zip" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "name" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "province_code" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "country_code" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "country_name" => array(
                            "type" => "string",
                            "location" => "json",
                        )
                    )
                )
            )
        ),


        /**
         *    updateCustomerAddress() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "updateCustomerAddress" => array(
            "httpMethod" => "PUT",
            "uri" => "/admin/customers/{customer_id}/addresses/{id}.json",
            "summary" => "Update a a customers address.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "customer_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                ),
                "id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                ),
                "address" => array(
                    "location" => "json",
                    "parameters" => array(
                         "customer_id" => array(
                            "type" => "number",
                            "location" => "json",
                        ),
                        "id" => array(
                            "type" => "number",
                            "location" => "json",
                        ),
                        "address1" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "address2" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "city" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "company" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "first_name" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "last_name" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "phone" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "province" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "country" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "zip" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "name" => array(
                            "type" => "boolean",
                            "location" => "json",
                        ),
                        "province_code" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "country_code" => array(
                            "type" => "string",
                            "location" => "json",
                        ),
                        "country_name" => array(
                            "type" => "string",
                            "location" => "json",
                        )
                    )
                )
            )
        ),


        /**
         *    deleteCustomerAddress() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "deleteCustomerAddress" => array(
            "httpMethod" => "DELETE",
            "uri" => "/admin/countries/{customer_id}/addresses/{id}.json",
            "summary" => "Delete a customers address.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "customer_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                ),
                "id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                )
            )
        ),


        /**
         *    deleteCustomerAddresses() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "deleteCustomerAddresses" => array(
            "httpMethod" => "PUT",
            "uri" => "/admin/countries/{id}/addresses/set.json?operation=destroy",
            "summary" => "Ddestroying multiple customer addresses.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                ),
                "address_ids[]" => array(
                    "type" => "string",
                    "location" => "uri"
                )
            )
        ),


        /**
         *    setCustomersDefaultAddress() method
         *
         *    reference: http://docs.shopify.com/api/customeraddress
         */
        "setCustomersDefaultAddress" => array(
            "httpMethod" => "DELETE",
            "uri" => "/admin/customers/{customer_id}/addresses/{id}/default.json",
            "summary" => "Assigning a new default address to a customer.",
            "responseModel" => "defaultJsonResponse",
            "parameters" => array(
                "customer_id" => array(
                    "type" => "number",
                    "location" => "uri",
                    "required" => true
                ),
                "id" => array(
                    "type" => "string",
                    "location" => "uri",
                    "required" => true
                )
            )
        )
      
    ),

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | This array of models is specifications to returning the response
    | from the operation methods.
    |
    */

    "models" => array(

    ),
);