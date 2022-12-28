<?php

namespace App\Dto\Response;

use App\Enumeration\StatusCode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

abstract class BaseResponse extends Response
{
    protected string $transformerClassNamespace = "App\Transformer\\";
    protected $statusCode = StatusCode::OK;
    protected string $message = '';
    protected array|object $data = [];
    protected int $errorCode = 0;
    protected string $transformerClass = '';
    protected int $options = JSON_PRETTY_PRINT;
    protected array $headersOption = [];
    protected ?PaginateResponse $paginate = null;
    public function __construct(
        string $transformerClass = '',
        $data = [],
        int $status = 200,
        array $headers = [
            'Content-Type' => 'application/json; charset=utf-8',
        ],
        int $options = 0,
        string $message = ''
    )
    {
        $this->data = $data;
        $this->statusCode = $status;
        $this->transformerClass = $transformerClass;
        $this->options = $options;
        $this->headersOption = $headers;
        $this->message = $message;
        parent::__construct($this->toJson(), $status, $headers);
    }

    public function toJson($options = 0): string
    {
        return json_encode([
            'status_code' => $this->statusCode,
            'message' => $this->message,
            'data' => $this->data,
            'error_code' => $this->errorCode,
            'meta' => $this->paginate
        ], $options);
    }

    /**
     * @param Model $model
     * @return $this
     * @noinspection PhpUndefinedMethodInspection
    */
    public function toDetail(Model $model): self {
        $className = $this->transformerClassNamespace . $this->transformerClass;
        $this->data = $className::toResponse($model);
        parent::__construct($this->toJson(), $this->statusCode, $this->headersOption);
        return $this;
    }

    /**
     * @param array $models
     * @return $this
     * @noinspection PhpUndefinedMethodInspection
    */
    public function toList(Collection $models): self {
        $className = $this->transformerClassNamespace . $this->transformerClass;
        $this->data = $className::toResponseList($models);
        parent::__construct($this->toJson(), $this->statusCode, $this->headersOption);
        return $this;
    }

    public function toPaginate(Collection $models, LengthAwarePaginator $paginator): self {
        $className = $this->transformerClassNamespace . $this->transformerClass;
        $this->data = $className::toResponseList($models);
        $this->paginate = new PaginateResponse($paginator);
        parent::__construct($this->toJson(), $this->statusCode, $this->headersOption);
        return $this;
    }

    public static function toCollection($data, $statusCode = 200, $message = '', $errorCode = 0): self {
        return json_encode([
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
            'error_code' => $errorCode,
        ]);

    }

}
