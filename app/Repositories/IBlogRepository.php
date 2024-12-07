<?php

namespace App\Repositories;

use App\Models\Blog;


interface IBlogRepository
{
   
   public function get();
   public function show(Blog $blog);
   public function create(array $data);
   public function update(Blog $blog, array $data);
}