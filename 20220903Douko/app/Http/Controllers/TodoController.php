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

    public function index()
    {
        $user = Auth::user();
        $tags = Tag::all();
        $todos = Todo::where('user_id',Auth::user()->id)->get();
        $param = ['todos' => $todos, 'user' =>$user,'tags' => $tags];
        // dd($param);
        return view('index',$param);
    }


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
        return redirect('./');
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('./');
    }
    
    public function search(Request $request){
        $user = Auth::user();
        $tags = Tag::all();
        $param = [ 'user' =>$user,'tags' => $tags];
        return view('search',$param);
    }
    
    public function result(Request $request){
        $user = Auth::user();
        $tags = Tag::all();
        if($request->task != null){
            if($request->tag_id != null){
                $result = Todo::where('user_id',Auth::user()->id)->get()
                ->where('task','LIKE BINARY',"%{$request->task}%")
                ->where('tag_id',$request->tag_id);
            }else{
                $result = Todo::where('user_id',Auth::user()->id)->get()
                ->where('task',$request->task);
            }
        }else{
            if($request->tag_id != null){
            $result = Todo::where('user_id',Auth::user()->id)->get()
            ->where('tag_id',$request->tag_id);
            }else{
            $result = Todo::where('user_id',Auth::user()->id)->get();
            }
        }

        $param = ['result' =>$result, 'user' =>$user,'tags' => $tags];
        return view('search',$param);      
    }
    


}