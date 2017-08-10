<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    protected $fillable = ['title', 'description', 'picture', 'adress', 'category_id', 'status_id'];
    // Get ticket status associated with ticket
    public function status()
    {
        return $this->belongsTo('App\Ticket_Status');
    }
    // Get ticket category associated with ticket
    public function category()
    {
        return $this->belongsTo('App\Ticket_Category');
    }
}
