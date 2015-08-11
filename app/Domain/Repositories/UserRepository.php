<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 11:01
 */

namespace app\Domain\Repositories;


use app\Domain\Contract\Crudable;
use app\Domain\Contract\Paginable;
use app\Domain\Contract\Searchable;

class UserRepository implements Crudable,Paginable,Searchable
{

    public function index()
    {

        return user::all();

    }

    public function create(array $data)
    {
        $user = new user;

        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->level = $data['level'];
        $user->password = $data['password'];
        $user->save();

        return $user;
    }

    public function update($id, array $data)
    {

        $user = user::findOrNew($id);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->address = $data['address'];
        $user->level = $data['level'];
        $user->password = $data['password'];
        $user->save();

        return $user;

    }

    public function show($id)
    {
        return user::findOrNew($id);
    }

    public function delete($id)
    {
        $user = user::findOrNew($id);
        $user->delete();
        return $user;
    }

    public function find($id, array $columns = ['*'])
    {
        $user = user::find($id, $columns);
        return $user;
    }

    public function getByPage($limit = 10, array $column = ['*']){

        $user  = user::getByPage($limit, $column);
        return $user;

    }
    public function search($query)
    {
        $guest = user::where('name','like','%'.$query.'%')->get();
        return $guest;
    }
}