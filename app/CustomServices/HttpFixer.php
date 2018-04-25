<?php

namespace App\CustomServices;

use GuzzleHttp\Client;

class HttpFixer
{
		protected $url;
    public function __construct(Client $guzzle_client)
    {
      $this->guzzle_client = $guzzle_client;
			$this->url = 'http://data.fixer.io/api/latest?access_key=' . \Config::get('app.fixer_api_key');
    }		

    public function getConversionRate() 
    {
			//api request to get latest currency conversion rate
			try{
				$guj_request = $this->guzzle_client->get($this->url);	
			}
			catch(Exception $e) {
				return ['status' => false, 'msg' => "Something went wrong try again. If error persist contact admin."];
			}
			if($guj_request->getStatusCode() == 200){
				$res = $guj_request->getBody();																			  // Get the actual response without headers
				$res_json = json_decode($res, true);
				if($res_json['success']){
					return ['status' => true, 'res' => $res];
				}
				else{
					return ['status' => false, 'msg' => "Error in getting latest currency conversion rate. Contact admin."];
				}
			}
			else{
				return ['status' => false, 'msg' => "Something went wrong try again. If error persist contact admin.",  'status_code' => $guj_request->getStatusCode()];
			}
    }
}
