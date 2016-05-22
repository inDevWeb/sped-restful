<?php

namespace SpedRest\Http\Controllers;

//use Illuminate\Http\Request;

use SpedRest\Http\Requests;
use SpedRest\Repositories\UserRepository;
use SpedRest\Services\UserService;

class UserController extends Controller
{
    protected $repository;
    protected $service;
    
    /**
     *
     * @param UserRepository $repository
     * @param UserService $service
     */
    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function index()
    {
        return $this->repository->all();
    }
    
    public function store()
    {
        return $this->service->create($request->all());
    }
    
    public function show($id)
    {
        return $this->repository->find($id);
    }
    
    public function update($id)
    {
        return $this->service->update($request->all(), $id);
    }
    
    public function destroy($id)
    {
        return $this->repository->find($id)->delete();
    }
}
