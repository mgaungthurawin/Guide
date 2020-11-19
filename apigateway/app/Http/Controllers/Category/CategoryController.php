<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use ApiResponser;
    public $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function index() {
        return $this->successResponse($this->categoryService->obtainCategories());
    }

    public function store(Request $request){
        return $this->successResponse($this->categoryService->createCategory($request->all()));
    }

}
