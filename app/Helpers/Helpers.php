<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 25/10/2020
 * Time: 10:44
 */

namespace App\Helpers;

/**
 * Class currencyTransactionHelper
 * @package App\Helpers
 * classe utilizzata per la conversione di valuta
 */
class currencyTransactionHelper
{
    public static function currencyConverter($currency, $amount)
    {
        if ($currency == 'dollar') //USD
        {
            return number_format($amount / 1.2, 2);
        }
        else if ($currency == 'pound') //POUND
        {
            return number_format($amount / 1.5, 2);
        }
//      else //EUR
//        {
//            return $amount;
//        }

    }
}