<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 8:27
 */

namespace app\Domain\Contract;


interface Paginable
{
    public function getByPage($limit = 10);
}