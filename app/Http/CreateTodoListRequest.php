<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTodoListRequest extends FormRequest 
{

    public function authorize(){
        return true;
    }

    public function rules (){
        return [
            'title' => 'required|min:3|max"255',
        ]
    };
}