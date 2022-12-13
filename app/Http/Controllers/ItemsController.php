<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function get(item $item){
        return new ItemResource($item)
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|sometimes|string',
            'todo_list_id' => 'required|exists:todo_lists.id'
        ]);

        $count = TodoList::count();

        $item = new item;
        $item->title = $request->input('title'); 
        $item->decription = $request->imput('description')
        $item->todo_list_id = $request->input('todo_list_id')

        $item->save();
        return new ItemResource($item)
    }

    public function update(Request $request, Item $item){
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|sometimes|string',
            'todo_list_id' => 'nullable|ometimes|exists:todo_lists.id'
        ]);

        if ($request->has('title')){
            $item->title = $request->input('title');
        }

        if ($request->has('decription')){
            $item->decription = $request->input('decription');
        }

        if ($request->has('todo_list_id')){
            $item->todo_list_id = $request->input('todo_list_id');
        }

        $item->save();

        return new CardResource($item);

    }

    public function delete(item $item){
        $item->delete()
        
       return response()->json([
           'success' => true,
       ])
   }
}

