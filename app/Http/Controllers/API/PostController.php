<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    //
    public function index(Request $request) {
        $posts = Post::all();
        return response()->json(['message' => 'Lấy dữ liệu thành công', "data"=> $posts], 200);
    }

    public function show(Request $request, $id) {
        $post = Post::find($id);
        return response()->json(['message' => 'Lấy dữ liệu thành công', "data"=> $post], 200);
    }

    public function showPostByUser(Request $request, $user_id) {
        $posts = Post::where("user_id", $user_id)->get();
        return response()->json(['message' => 'Lấy dữ liệu thành công', "data"=> $posts], 200);
    }

    public function create(Request $request) {
        $params = $request->post();
        $post = Post::create($params);
        return response()->json(['message' => 'Tạo mới thành công', "data"=>  $params], 200);
    }

    public function update(Request $request, $id) {
        $params = $request->post();
        $post = Post::where('id', $id)->update($params);
        return response()->json(['message' => 'Chỉnh sửa thành công', "data"=>  $params], 200);
    }

    public function delete(Request $request, $id) {
        $post = Post::where('id', $id)->delete();
        return response()->json(['message' => 'Xoá thành công', "data"=> $post], 200);
    }


}
