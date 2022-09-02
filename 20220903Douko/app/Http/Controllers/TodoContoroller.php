<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Todo;
use App\Models\Tag;
use App\Models\User;

class TodoController extends Controller
{

    public function index(TodoRequest $todo)
    {
        $todos = Todo::find(user->user_id);
        return view('index',['todos'=> $todos]);
    }

    public function create(TodoRequest $request)
    {
        $create = $request->all();
        Todo::create($create);
        return redirect('./');
    }

    public function update(TodoRequest $request)
    {
        $update = $request->all();
        unset($update['_token']);
        Todo::find($request->id)->update($update);
        // Todo::where('id', $request->id)->update($update);
        return redirect('./');
        // echo $request->task0.$update->id;
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('./');
    }

    public function search(Request $request){

    }
    public function result(Request $request){

    }


}