<?php

namespace App\Enumeration;

enum ZaloPayDetailMethod: int
{
    case ZALOPAY_VISA_MASTERCARD_JCB = 36;
    case ZALOPAY_BANK_ACCOUNT = 37;
    case ZALOPAY_WALLET = 38;
    case ZALOPAY_ATM = 39;
    case ZALOPAY_DEBIT_CARD = 41;

}
