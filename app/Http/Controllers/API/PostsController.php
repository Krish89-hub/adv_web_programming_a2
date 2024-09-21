<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends BaseController{
    public function getAll(){
        $all = Post::all();
        return $this->sendResponse($all,"");
    }
    public function getSinglePost(Request $request,string $id){
        $post = Post::with("user")->find($id);
        return $this->sendResponse($post,"");
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);
        $data = $request->only('title','content');
        $data ['user_id'] = $request->user()->_id;
        Post::create($data);

        return $this->sendResponse("","Created succesfully.");
    }
}
