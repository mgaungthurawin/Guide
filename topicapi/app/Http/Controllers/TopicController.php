<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopicController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
        $topics = Topic::all();
        return $this->successResponse($topics);
    }

    public function store(Request $request) {
        $rules = [
            'topic' =>  'required|max:255',
            'category_id' =>  'required',
        ];
        $this->validate($request, $rules);

        $topic = Topic::create($request->all());

        return $this->successResponse($topic, Response::HTTP_CREATED);
    }

    public function show($topic_id) {
        $topic = Topic::findOrFail($topic_id);
        return $this->successResponse($topic);
    }

    public function update($topic_id, Request $request) {
        $rules = [
            'topic' =>  'required|max:255',
            'category_id' =>  'required',
        ];
        $this->validate($request, $rules);
        $topic = Topic::findOrFail($topic_id);
        $topic->fill($request->all());
        if($topic->isClean()){
            return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $topic->save();
        return $this->successResponse($topic);
    }

    public function destroy($topic_id) {
        $topic = Topic::findOrFail($topic_id);
        $topic->delete();
        return $this->successResponse($topic);
    }

    
}
