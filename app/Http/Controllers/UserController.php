<?php

namespace App\Http\Controllers;

use App\Domain\Contract\Crudable;
use App\Domain\Contract\Paginable;
use App\Domain\Contract\Searchable;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * @var Paginable
     */
    protected $page;
    /**
     * @var Searchable
     */
    protected $search;
    /**
     * @var Crudable
     */
    protected $crud;

    /**
     * @param Paginable $page
     * @param Searchable $search
     * @param Crudable $crud
     */
    public function __construct(
        Paginable $page,
        Searchable $search,
        Crudable $crud

    )
    {
        $this->crud = $crud;
        $this->search = $search;
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->page->getByPage($limit = 10);
    }

    public function store(UserRequest $request)
    {
        return $this->crud->create($request->all());
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->crud->find($id);
    }


    /**
     * @param $id
     */
    public function edit($id)
    {

    }


    /**
     * @param UserRequest $request
     * @param $id
     *
     * @return mixed
     */
    public function update(UserRequest $request, $id)
    {
        return $this->crud->update($id, $request->all());
    }


    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->crud->delete($id);
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function search(Request $request)
    {

        return $this->search->search($request->get('search'));

    }
}
