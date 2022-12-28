<?php

namespace App\Repository\PaymentMethod;

use App\Models\PaymentMethod;
use App\Repository\CrudInterfaceImpl;

class PaymentMethodServiceImpl extends CrudInterfaceImpl implements PaymentMethodService
{
    public function __construct(PaymentMethod $model)
    {
        $this->model = $model;
    }
}
