<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
   function index(){
    $todos = Todo::latest()->where('user_id',auth()->user()->id)->get();
    return view('todos.index',['todos'=>$todos]);
   } 

   function store(Request $request){
    $this->validate($request,[
        'body'=>'required|max:255'
    ]);
    Todo::create(['body'=>$request->body,'user_id'=>auth()->user()->id]);
    return back();
    }

    function update(Request $request,$id){
        $todo = Todo::find($id);
        $todo->body = $request->inputValue;
        $todo->save();
        return response(200);
    }

    function destroy(Todo $todo){
        $todo->delete();
        return back();
    }
function complete(Request $request,Todo $todo){
        $todo->status = 'completed';
        $todo->save();
        return back();
}
}

