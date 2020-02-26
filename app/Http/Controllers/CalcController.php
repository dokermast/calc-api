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
        $input = $this->getInput($request);

        if ($this->checkJson($input)) {

            return [ 'amount' => $this->calc($this->getInput($request))];
        }

        return  $this->sendErrorMessage('INPUT JSON IS WRONG');
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

                return $input;
            } else {

               return  $this->sendErrorMessage('INPUT JSON IS WRONG');
            }
        } else {

            return  $this->sendErrorMessage('INPUT METHOD IS NOT POST');
        }
    }

    /**
     * @param $input
     * @return float
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

        return  round($sum * $rates[$base_currency], 2);
    }

    /**
     * @return mixed
     */
    public function getRates()
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
    public function checkJson($data)
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

    /**
     * @param $message
     * @return array
     */
    public function sendErrorMessage($message)
    {
        return ['message' => $message];
    }
}
