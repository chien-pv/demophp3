<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;

class AboutController extends Controller
{
    public function index(Request $request) {

        \DB::enableQueryLog();
        $q = $request->query("q");
        $q = "%$q%";
        $page = (int) $request->query("page");
    
        $off = ($page-1)*3;
       
        $count  = User::count();
        $totalPage = ceil($count/3);
    
        $users = User::select("id", "name", "email")->where("name", "like", $q)->get();
        $data = UserResource::collection($users);
        // return view("about", ["users"=> $users]); 
        return response()->json($data, 400);
    }

    public function show(string $id) {
        // var_dump( $request->query())

        return view("show", ["id"=>$id, "name"=> "Nguyen Van A"]);
    }
    public function destroy(string $id) {
        User::destroy($id);
        // var_dump($id);
        return redirect("/about");
    }

    public function create(StoreUserRequest $request) {
        // $request->except('name');
        // $validated = $request->validated();

        // $validated = $request->safe()->only(['name']);
        $validated = $request->validated();

        // var_dump($request->safe()->only(['name', 'email']));


        // $data = $request->post();
        // $user = new User;
        // $user->name = $data["name"]->e;
        // $user->email = $data["email"];
        // $user->password = $data["password"];
        
        // $user->save();
        User::create($validated);

        return redirect("/about");
    }

    public function new(Request $request) {
         return view("new");
    }
}
