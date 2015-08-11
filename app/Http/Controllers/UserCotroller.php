<?php

namespace App\Http\Controllers;

use app\Domain\Contract\Paginable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserCotroller extends Controller
{

    protected $page;
    protected $search;
    protected $crud;

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

    public function index()
    {
        return $this->page->getByPage($page = 1, $limit = 15);
    }


    public function create(Request $request)
    {
        return $this->crud->create($request->all());
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
