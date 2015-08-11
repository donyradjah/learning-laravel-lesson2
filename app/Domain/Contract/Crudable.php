<?php
/**
 * Created by PhpStorm.
 * User: - LENOVO -
 * Date: 11/08/2015
 * Time: 8:26
 */

namespace App\Domain\Contract;


/**
 * Interface Crudable
 *
 * @package app\Domain\Contract
 */
interface Crudable
{
    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

}