<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_frame extends Model
{
    use HasFactory;
    protected $table = "t_frame";
    protected $primaryKey = "id";
    protected $fillable = [
       'frame_sn', 'frame_code', 'ts'
    ];
}