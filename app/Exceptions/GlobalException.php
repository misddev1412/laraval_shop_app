<?php

namespace App\Exceptions;

use App\Dto\Response\ErrorResponse;
use Exception;

class GlobalException extends Exception
{
    private int $statusCode;
    private string $httpCode;
    private array $data;
    public function __construct($httpCode = 400, $message = '', $statusCode = 0, $data = [], Exception $previous = null)
    {
        parent::__construct($message, $httpCode, $previous);
        $this->statusCode = $statusCode;
        $this->httpCode = $httpCode;
        $this->data = $data;
    }
    //
    public function render()
    {
        return (new ErrorResponse())->setErrors($this->httpCode, $this->statusCode, $this->data, $this->message);
    }
}
