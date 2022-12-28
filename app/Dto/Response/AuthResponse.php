<?php

namespace App\Dto\Response;

use App\Transformer\AuthTransformer;
use Illuminate\Database\Eloquent\Model;

class AuthResponse extends BaseResponse
{
    public string $token;
    public string $expiredAt;

    public function __construct()
    {
        parent::__construct('AuthTransformer');
    }
}
