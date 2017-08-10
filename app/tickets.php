<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    protected $fillable = ['title', 'description', 'picture', 'adress', 'category_id', 'status_id'];
}
