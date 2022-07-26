<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //properti yg boleh di isi dan sisanya tidakk boleh menggunakan fillable
    // protected $fillable = [
    //    'title', 'excerpt', 'body'
    // ];

    //properti yg tidak boleh di isi dan sisanya boleh di isi menggunakan guraded
    protected $guarded = ['id'];
}
