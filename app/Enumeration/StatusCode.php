<?php

namespace App\Enumeration;

enum StatusCode: int
{
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NO_CONTENT = 204;
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case UNPROCESSABLE_ENTITY = 422;
    case INTERNAL_SERVER_ERROR = 500;
    case SERVICE_UNAVAILABLE = 503;
    //Product price 1000 - 1099
    case PRODUCT_PRICE_NOT_FOUND = 1000;
    //Product 1100 - 1199
    case PRODUCT_NOT_FOUND = 1100;
    case PRODUCT_OUT_OF_STOCK = 1101;
    //Product variant 1200 - 1299
    const PRODUCT_VARIANT_NOT_FOUND = 1200;
    //Payment 1300 - 1399
    case PAYMENT_MAC_NOT_VALID = 1300;

}
