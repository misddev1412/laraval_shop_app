<?php
namespace App\Repository;
interface CrudInterface
{
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
    public function all();
    public function paginate($page, $limit);
    public function where($column, $operator, $value);
}
