<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $guarded = ['id'];
    protected $table = 'todo';

}

?>
