<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_batt extends Model
{
    use HasFactory;
    protected $table = "m_batts";
    protected $primaryKey = "id";
    protected $fillable = [
       'cell_sern', 'capa_grad', 'crtn_sern', 'm', 'c_po', 'v_po', 'ir_po', 'k', 'w', 'ha', 'hc', 't', 'bin', 'v_gr', 'delta_mv', 'v_status', 'ir_gr', 'delta_ir', 'ir_status', 'frame_sn', 'cell', 'd_test', 'batch', 'po'
    ];
}