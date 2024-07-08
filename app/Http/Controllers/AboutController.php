<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request) {

        $q = $request->query("q");

        $q = "%$q%";

        $users = DB::table('users')->select("id", "name", "email")->where("name", "like", $q)->get();
        
        var_dump($q);
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
