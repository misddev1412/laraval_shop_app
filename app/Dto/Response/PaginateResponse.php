<?php

namespace App\Dto\Response;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class PaginateResponse
{
    public int $total;
    public int $per_page;
    public int $current_page;
    public int $last_page;
    public int $from;
    public int $to;
    public array $data;

    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->total = $paginator->total();
        $this->per_page = $paginator->perPage();
        $this->current_page = $paginator->currentPage();
        $this->last_page = $paginator->lastPage();
    }
}
