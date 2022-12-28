<?php
namespace App\Repository;
class CrudInterfaceImpl implements CrudInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->where('id', $id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($page, $limit)
    {
        return $this->model->paginate($limit);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function where($column, $operator, $value)
    {
        return $this->model->where($column, $operator, $value);
    }
}
