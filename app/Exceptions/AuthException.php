<?php

namespace App\Exceptions;

use App\Dto\Response\ErrorResponse;
use Exception;

class AuthException extends Exception
{
    public function __construct($code = 401, $message = 'auth.unauthorized', Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    //
    public function render()
    {
        return (new ErrorResponse())->setErrors($this->code, $this->code, [], $this->message);
    }
}
