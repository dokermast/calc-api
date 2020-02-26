<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function getCount(Request $request)
    {
        $result = $this->getInput($request)['result'];
        if ($result) {
            if ($this->checkJson($this->getInput($request)['input'])) {

                $output = $this->calc($this->getInput($request)['input']);

                return [
                    "checkoutPrice" => $output['checkoutPrice'],
                    "checkoutCurrency" => $output['checkoutCurrency']
                ];
            }

            return  ['message' => "WRONG JSON ITEMS"];
        } else {

            return  ['message' => $this->getInput($request)['message']];
        }
    }

    /**
     * @param $request
     * @return array
     */
    private function getInput($request)
    {
        if ($request->isMethod('post')) {
            if (!empty($request->json()->all())) {
                $input = $request->json()->all();

                return [
                    'result' => true,
                    'input' => $input
                ];
            } else {

               return  [
                   'result' => false,
                   'message' => 'INPUT JSON IS WRONG OR EMPTY!'
               ];
            }
        } else {

            return  [
                'result' => false,
                'message' => 'INPUT METHOD IS NOT POST'
            ];
        }
    }

    /**
     * @param $input
     * @return array
     */
    private function calc($input)
    {
        $base_currency = $input['checkoutCurrency'];
        $items = $input['items'];
        $rates = $this->getRates();
        $sum = null;

        foreach ($items as $item) {
            $sum = $sum +  $item['price'] / $rates[$item['currency']] * $item['quantity'];
        }

        return  [
            "checkoutPrice" => round($sum * $rates[$base_currency], 2),
            "checkoutCurrency" =>  $base_currency
        ];
    }

    /**
     * @return mixed
     */
    private function getRates()
    {
        $OPX_API_ID = env("OPX_API_ID");
        $request = 'https://openexchangerates.org/api/latest.json?app_id='.$OPX_API_ID;
        $responce = json_decode(file_get_contents($request), true);
        $rates = $responce['rates'];

        return $rates;
    }

    /**
     * @param $data
     * @return bool
     */
    private function checkJson($data)
    {
        $keys = [
            [ "items", "checkoutCurrency"],
            [ "currency", "price", "quantity"]
        ];

        $res = [];
        if (count(array_diff($keys[0],array_keys($data))) == 0) {
            foreach ($data['items'] as $elem) {
                if (count(array_diff($keys[1],array_keys($elem))) == 0) {
                    $res[] = true;
                } else {
                    $res[] = false;
                }
            }
        }

        if (count($res) != 0 && !in_array(false, $res)) {

            return true;
        }

        return false;
    }
}
