<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Models\Tag;
use App\Models\User;

class TodoController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::where('user_id',Auth::user()->id)->get();
        $param = ['todos' => $todos, 'user' =>$user,'tags' => $tags];
        // dd($param);
        return view('index',$param);
    }

    // public function find(TodoRequest $request)
    // {
    //     $todos = Todo::find($request->user_id);
    //     $user = Auth::user();
    //     $tags = Tag::all();
    //     $param = ['todos' => $todos, 'user' =>$user,'tags' => $tags];
        
    //     return view('find',$param);
    // }

    public function logout(TodoRequest $request)
    {
        return redirect('./');
    }
    
    public function create(TodoRequest $request)
    {
        $create = $request->all();
        // dd($create);
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
        $user = Auth::user();
        $tags = Tag::all();
        $result = Todo::where('user_id',Auth::user()->id)->get();
        $param = ['todos' =>$result, 'user' =>$user,'tags' => $tags];
        return view('search',$param);
    }
    public function result(TodoRequest $request){
        $result = $request->all();
        $user = Auth::user();
        // dd($result);
        $tags = Tag::all();
        $param = ['todos' => $result, 'user' =>$user,'tags' => $tags];

        return view('search',$param);      
    }


}