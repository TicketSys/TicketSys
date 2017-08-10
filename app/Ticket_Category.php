<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_Category extends Model
{
    protected $table = 'ticket_categories';
    public function articles()
    {
        return $this->hasMany('App\tickets');
    }
}
