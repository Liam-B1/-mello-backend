<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function all () {
        $todoLists = TodoList::orderBy('list_order')
            ->get();

        return TodoListResource::collection($todoLists);
    }

    public function basic () {
            $todoLists = TodoList::orderBy('list_order')
                ->get();
    
            return BasicTodoListResource::collection($todoLists);
        }
    }

    public function index(){
        return TodoList::all();
    }

    public function get(TodoList $TodoList){
        return $TodoList->with('items')->get();
    }

    // public function store(CreateTodoListRequest $request){

    // }

    public function store(request $request){
        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);

        $count = TodoList::count();

        $todoList = new TodoList;
        $todoList->title = $request->input('title');
        $todoList->list_order = $count + 1; 
        $todoList->save();

        return new TodoListResource($todoList)
    }

    public function update(Request $request, TodoList $todoList){
        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);
  
        $todoList->title = $request->input('title');
        if($request->has('list_order')) {
            $todoList->list_order = $request->input('list_order');
        }

        $todoList->save();

        return new TodoListResource($todoList);
    }

    public function delete(TodoList $todoList){
         $todoList->delete()
        return response()->json([
            'success' => true,
        ])
    }
}


