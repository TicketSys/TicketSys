<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_Status extends Model
{	
	protected $table = 'ticket_statuses';
    public function articles()
    {
        return $this->hasMany('App\tickets');
    }
}
