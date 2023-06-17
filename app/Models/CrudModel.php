<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{
    use HasFactory;
    protected $table='registration';

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded=[];



}
