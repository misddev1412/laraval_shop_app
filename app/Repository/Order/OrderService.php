<?php

namespace App\Repository\Order;
use App\Repository\CrudInterface;

interface OrderService extends CrudInterface
{
    public function updateStatus(int $id, array $request);
}
