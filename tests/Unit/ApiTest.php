<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;


class ApiTest extends TestCase
{
    /**
     * the test for all functionality
     */
    public function testGetCount()
    {
        $params = '{
            "items" : {
                "42": {
                    "currency": "EUR",
                    "price": 89,
                    "quantity": 1
                },
                "55": {
                    "currency": "USD",
                    "price": 10,
                    "quantity": 3
                },
                "54": {
                    "currency": "UAH",
                    "price": 10090,
                    "quantity": 3
                }
            },
            "checkoutCurrency": "EUR"
        }';
        $params = json_decode($params, true);
        $url = '/api/count';
        $response = $this->postJson($url, $params);
        $content = $response->getContent();
        $response->assertSeeText('checkoutPrice');
    }

    /**
     *  test if input json is empty or wrong
     */
    public function testGetInputEmpty()
    {
        $params = '{}';
        $params = json_decode($params, true);
        $url = '/api/count';
        $response = $this->postJson($url, $params);
        $response->assertSeeText('INPUT JSON IS WRONG OR EMPTY!');
    }

    /**
     *  test if input json items is empty or wrong
     */
    public function testGetInputItems()
    {
        $params = '{
          "items": {
            "42": {
              "ency": "EUR",
              "price": 89,
              "quantity": 1
            },
            "55": {
              "currency": "USD",
              "price": 10,
              "quantity": 3
            },
            "54": {
              "currency": "UAH",
              "price": 10090,
              "quantity": 3
            }
          },
          "eckoutCurrency": "EUR"
        }';
        $params = json_decode($params, true);
        $url = '/api/count';
        $response = $this->postJson($url, $params);
        $response->assertSeeText('WRONG JSON ITEMS');
    }
}
