<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 9:50
 */

namespace app\Domain\Repository;

use app\Domain\Contract\Repository as RepositoryContract;

abstract class AbstractRepository implements RepositoryContract
{
    protected $model;

    protected $with = [];


    public function load(array $with)
    {
        $this->with = $with;

        return $this;

    }

    public function  make()
    {

        return $this->model->model->with($this->with);

    }

    public function all(array $columns = ['*'])
    {
        return $this->make()->get($columns);
    }

    public function  likeSearch($key, $value, $limit = 10, array $columns = ['*'])
    {
        return $this->make()->where($key, 'like', '%' . $value . '%')->paginate($limit, $columns);
    }

    public function  create(array $data)
    {
        $q = $this->model->create($data);
        if (!$q) {
            return $this->createError();
        }

        return $this->createSuccess();
    }

    public function update($id, array $data)
    {
        $q = $this->find($id)->fill($data)->save();
        if (!$q) {

            return $this->updateError();
        }
        return $this->updateSuccess();

    }

    public function delete($id)
    {
        $q = $this->find($id);

        if (!$q) {

            return $this->deleteError();

        }
        $q->delete();
        return $this->deleteSuccess();

    }

    public function getBypage($limit = 10, array $columns = ['*'])
    {
        return $this->make()->paginate($limit, $columns);
    }

    public function getManyBy($key, $value, array $column = ['*'])
    {
        return $this->make()->where($key, $value)->get($columns);
    }

    public function getFirstBy($key, $value, array $columns = ['*'])
    {
        return $this->make()->where($key, $value)->first($columns);
    }

    public function getWhereIn($key, array $array, array $columns = ['*'])
    {
        return $this->make()->whereIn($key, $array)->get($columns);
    }

    public function instance(array $attributes = [])
    {
        return $this->model->newInstance($attributes);
    }

    public function __call($method, $parameters)
    {
        if (method_exists($this->model, $method)) {
            return call_user_func_array([$this->model, $method], $parameters);
        }
        throw new \BadMethodCallException(sprintf('Method [%s] does not exist.', $method));
    }

    public function createSuccess()
    {
        return response()->json(
            [
                'success' => true,
                'result' => [
                    'message' => 'Berhasil menyimpan data.'
                ]
            ]
        );
    }

    public function updateSuccess()
    {
        return response()->json(
            [
                'success' => true,
                'result' => [
                    'message' => 'Berhasil update data.'
                ]
            ]
        );
    }

    public function createError()
    {
        return response()->json(
            [
                'success' => true,
                'result' => [
                    'message' => 'Gagal menyimpan data.'
                ]
            ]
        );
    }

    public function updateError()
    {
        return response()->json(
            [
                'success' => true,
                'result' => [
                    'message' => 'Gagal update data.'
                ]
            ]
        );
    }

    public function deleteSuccess()
    {
        return response()->json(
            [
                'success' => true,
                'result' => [
                    'message' => 'berhasil hapus data.'
                ]
            ]
        );
    }

    public function deleteError()
    {

        return response()->json(
            [
                'success' => true,
                'result' => [
                    'message' => 'gagal hapus data'
                ]

            ]

        );

    }


}