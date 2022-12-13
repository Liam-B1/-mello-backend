
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{

    use HasFactory, SoftDeletes;

    public function items(){
        return $this->hasMany(item::class);
    }



}

