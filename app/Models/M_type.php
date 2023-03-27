<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_type extends Model
{
    use HasFactory;
    protected $table = "m_type";
    protected $primaryKey = "id";
    protected $fillable = [
       'type_batt', 'po'
    ];
}
