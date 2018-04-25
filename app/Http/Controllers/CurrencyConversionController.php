<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JsValidator;
use Illuminate\Support\Facades\Input;
use App\CustomServices\HttpFixer;

class CurrencyConversionController extends Controller
{
		//form validation rule for server side goes here
		protected $validationRules=[
			'base_currency' => 'required',
			'base_amount' => 'required|numeric|min:1|max:9999999999999999999999',
			'target_currency' => 'required'
		];
		//form validation messages goes here
		protected $messages=[
			'base_currency.required' => 'Base currency required.',
			'base_amount.required' => 'Amount required for conversion.',
			'target_currency.required'  => 'Target currency required.'
		];

    public function __construct(HttpFixer $HttpFixer)
    {
      $this->HttpFixer = $HttpFixer;
    }

    function index()
		{
			$api_res = $this->HttpFixer->getConversionRate();
			$response_json = array();
			if($api_res['status']){
				$response_json = json_decode($api_res['res'],true);
			}
			else{
				flash($api_res['msg'])->error()->important();
	
				$response_json['rates'] = [];
			}

			$validator = JsValidator::make($this->validationRules,$this->messages,array(),"form");
			return view('index')->with(['symbole_ar' => $response_json['rates'], 'validator' => $validator]);
		}

    function convertCurrency(request $request)
		{
			//check form validation
			$validator = JsValidator::make($this->validationRules,$this->messages,array(),"form");

			$result_amount = ((float)$request->target_currency/(float)$request->base_currency) * (float)$request->base_amount; //convert currency
			$result_amount = number_format((float)$result_amount, 2, '.', '');
			return view('result')->with(['base_currency' => $request->base_currency_symbol, 'target_currency' => $request->target_currency_symbol, 'base_amount' => $request->base_amount, 'target_amount' => $result_amount]);

			//redirect to form with old form data
			Input::flash();
			return redirect()->route('index');
		}

}
