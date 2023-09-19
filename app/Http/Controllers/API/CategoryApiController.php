<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseAPIController;
use App\Models\ConfessionCategory;

class CategoryApiController extends BaseAPIController
{
    public function index(){
        $categories = ConfessionCategory::whereStatus('Active')->orderBy('title', 'ASC')->get(['id', 'title']);

        return $this->success_response($categories);
    }

    public function show(ConfessionCategory $category){
        $category->load('confessions');

        return $this->success_response($category);
    }

}