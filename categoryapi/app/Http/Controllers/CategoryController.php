<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
	use ApiResponser;
    public function __construct() {
            //
	}

    public function index() {
        $categories = Category::all();
        return $this->successResponse($categories);
    }

    public function store(Request $request) {
    	$rules = [
            'name' =>  'required|max:255',
        ];
        $this->validate($request, $rules);

        $category = Category::create($request->all());

        return $this->successResponse($category, Response::HTTP_CREATED);
    }

    public function show($category_id) {
    	$category = Category::findOrFail($category_id);
    	return $this->successResponse($category);
    }

    public function update($category_id, Request $request) {

		$rules = [
	        'name' =>  'required|max:255',
	    ];
	    $this->validate($request, $rules);
	    $category = Category::findOrFail($category_id);
        $category->fill($request->all());
        if($category->isClean()){
            return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $category->save();
        return $this->successResponse($category);
    }

    public function destroy($category_id) {
        $category = Category::findOrFail($category_id);
        $category->delete();
        return $this->successResponse($category);
    }


}
