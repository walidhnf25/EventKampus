<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    public $table = "events";

    protected  $primaryKey = 'idEvent';

    public function users()
    {
        return $this->belongsToMany(Users::class, 'event_user', 'idEvent', 'idUser');
    }
}
