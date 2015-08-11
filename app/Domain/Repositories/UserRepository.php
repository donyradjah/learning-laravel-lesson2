<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 11:01
 */

namespace App\Domain\Repositories;


use App\Domain\Contract\Crudable;
use App\Domain\Contract\Paginable;
use App\Domain\Contract\Searchable;
use App\User;

/**
 * Class UserRepository
 *
 * @package App\Domain\Repositories
 */
class UserRepository extends AbstractRepository implements Crudable, Paginable, Searchable
{

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $data)
    {
        return parent::create(
            [
                'name'     => $data['name'],
                'phone'    => $data['phone'],
                'email'    => $data['email'],
                'address'  => $data['address'],
                'level'    => $data['level'],
                'password' => bcrypt($data['password'])
            ]);
    }

    /**
     * @param $id
     * @param array $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, array $data)
    {
        return parent::update($id, [
            'name '     => $data['name'],
            'phone '    => $data['phone'],
            'email '    => $data['email'],
            'address '  => $data['address'],
            'level '    => $data['level'],
            'password ' => bcrypt($data['password'])
        ]);

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        return parent::delete($id);
    }


    /**
     * @param int $limit
     * @param array $column
     *
     * @return mixed
     */
    public function getByPage($limit = 10, array $column = ['*'])
    {
        return parent::getByPage($limit, $column);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function search($query)
    {
        return parent::likeSearch('name', $query);
    }
}