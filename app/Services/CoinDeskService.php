<?php


namespace App\Services;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Class CoinDeskService
 * Service used to connect to CoinDesk via API and retrieve BPI
 * @package App\Services
 * @author Tiko Banyini
 */
class CoinDeskService
{


    /**
     * Connect to Coindesk API and get the current price
     * @param $currency
     * @return bool
     * @throws \Exception
     */
    public static function getBPIByCurrency($currency){
        Log::info("CoinDeskService getBPIByCurrency()");
        $currency = strtoupper($currency);
        if(!in_array($currency, array('USD', 'GBP', 'EUR'))){
            throw new \Exception("Currency not supported: $currency");
        }

        $client = new Client();
        $restResult = $client->get('https://api.coindesk.com/v1/bpi/currentprice.json');
        if($restResult->getStatusCode() == 200 && is_array($arrResult = json_decode($restResult->getBody()->__toString(), true) )){

            return $arrResult['bpi'][$currency];
        }
        return false;
    }

    /**
     * @param $amount
     * @param string $currency
     * @return string
     */
    public static function convertToCurrency($amount, $currency = 'USD'){
        $result = self::getBPIByCurrency($currency);
        $bitCoin = round($amount / $result['rate_float'],7);
        $output =  "$amount $currency is $bitCoin BTC ({$result['rate_float']} - 1 BTC)";

        return $output;
    }

}