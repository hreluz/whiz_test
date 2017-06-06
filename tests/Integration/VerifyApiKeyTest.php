<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VerifyApiKeyTest extends TestCase
{
	use DatabaseTransactions;

	public function test_api_key_in_header_is_valid_to_use_api()
	{
		//Having
    	$key = env('API_KEY');

        //When
        $response = $this->json('POST', 'api/check', [], ['api-key' => $key ]);

        //Then
        $response->seeStatusCode(200)
         		->seeJson([
	                'result' => true
	            ]);
	}

	public function test_api_key_in_body_is_valid_to_use_api()
	{
		//Having
    	$key = env('API_KEY');

        //When
        $response = $this->json('POST', 'api/check', ['api-key' => $key ], [] );

        //Then
        $response->seeStatusCode(200)
         		->seeJson([
	                'result' => true
	            ]);
	}


	public function test_api_key_is_not_valid_to_use_api()
	{
        //When
        $response = $this->json('POST', 'api/check', [], ['api-key' => 'xxx']);

        //Expecting
        $response->seeStatusCode(401)
         		->seeJson(['error' => 'unauthorized' ]);
	}
}