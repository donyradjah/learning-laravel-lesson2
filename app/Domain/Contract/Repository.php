<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 9:44
 */

namespace app\Domain\Contract;


interface Repository
{
    public  function all();

    public  function  getManyBy($key, $value);

    public function getFirsBy($key, $value);

    public function  instance (array $attributes =[]);


}
