<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Repositories\IBlogRepository;
use Illuminate\Http\Request;

class BlogController extends ApiController
{
    private IBlogRepository $blogRepository;

    function __construct(IBlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            return $this->showAll($this->blogRepository->get());
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        try {
            return $this->showOne($this->blogRepository->create($request->all()), 201);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        try {
            return $this->showOne($this->blogRepository->show($blog));
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            return $this->showOne($this->blogRepository->update($blog, $request->all()), 201);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage(), 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
