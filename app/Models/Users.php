<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    public $table = "users";

    protected $fillable = [
        'nama',
        'email',
        'tanggalLahir',
        'noHP',
        'password',
    ];

    protected  $primaryKey = 'idUser';
}
