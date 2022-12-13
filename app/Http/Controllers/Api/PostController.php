<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Post as PostResource;


class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return $this->sendResponse(PostResource::collection($posts) , 'true');
    }

    public function single_post($id)
    {
        $post = Post::find($id);
        
        if($post == false)
        {
            return $this->sendError('Post Not Found');
        }
        
        return $this->sendResponse(new PostResource($post) , 'true');
    }

    public function store_post(PostRequest $request)
    {
        $validation = $request->validated();
        $data = Post::create($validation);
        return $this->sendResponse($data , 'true');
    }

    public function update_post($id , PostRequest $request)
    {
        $data = Post::find($id);
        
        if($data == false)
        {
            return $this->sendError('Post Not Found');
        }

        $validation = $request->validated();
        $data->update($validation);
        
        return $this->sendResponse($data , 'true');
    }

    public function delete_post($id)
    {
        $data = Post::find($id);

        if($data == false)
        {
            return $this->sendError('Post Not Found');
        }

        $data->delete();

        return $this->sendResponse($data , 'true');
    }
}
