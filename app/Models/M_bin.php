<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_bin extends Model
{
    use HasFactory;
    protected $table = "m_bin";
    protected $primaryKey = "id";
    
    //field yg boleh di isi masal
    // protected $fillable = [
    //    'po', 'bin', 'bin_param','created_at','updated_at'
    // ]; 

    //field yg tidak boleh di isi masal
    protected $guarded = ['id'];
}
