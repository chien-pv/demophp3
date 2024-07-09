<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request) {

        $q = $request->query("q");

        $q = "%$q%";

        $page = (int) $request->query("page");
       
        $off = ($page-1)*3;
       

        $count  =  $users = DB::table('users')->get()->count("id");
        $totalPage = ceil($count/3);
        // DB::table('users')->where("id", "=", 14)->delete();

        // DB::table('users')->where("id", "=", 1)
        // ->insert(
        //     ["name"=> "Abc xyz", "email"=>"abc6@gmail.com"]
        // );
        $users = DB::table('users')->select("id", "name", "email")->where("name", "like", $q)->get();

        // $posts = DB::table('posts')->Join('users', 'posts.user_id', '=', 'users.id')->get();
        // var_dump($posts);
        
        return view("about", ["users"=> $users ]); 
    }

    public function show(string $id) {
        // var_dump( $request->query())

        return view("show", ["id"=>$id, "name"=> "Nguyen Van A"]);
    }

    public function create(Request $request) {
        return $request->post(); 
    }
}
