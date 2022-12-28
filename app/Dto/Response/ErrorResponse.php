<?php

namespace App\Dto\Response;

use App\Enumeration\StatusCode;

class ErrorResponse extends BaseResponse
{
    /**
     * @var array<string, mixed>
     */
    public array $errors;

    /**
     * @param array<string, mixed> $errors
     */
    public function setErrors(int $statusCode, $errorCode, array $data, $message): self
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->errorCode = $errorCode;
        $this->message = $message;
        parent::__construct('', $this->data, $statusCode, $this->headersOption, 0, $this->message);
        return $this;
    }
}
