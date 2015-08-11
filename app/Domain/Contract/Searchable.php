<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 8:28
 */

namespace App\Domain\Contract;


interface Searchable
{
    public function search($query);
}