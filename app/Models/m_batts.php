<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_batts extends Model
{
    use HasFactory;
    protected $table = "m_batts";
    protected $orimaryKey = "cell_sern";
    protected $fillable = [
       'cell_sern', 'capa_grad', 'crtn_sern', 'm', 'c_po', 'v_po', 'ir_po', 'k', 'w', 'ha', 'hc', 't', 'bin', 'v_gr', 'ir_gr', 'frame_sn', 'cell', 'd_test'
    ];
}