<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBattsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_batts', function (Blueprint $table) {
            $table->id();
            $table->string('cell_sern', 50)->unique();
            $table->string('capa_grad', 10);
            $table->string('crtn_sern', 50);
            $table->float('m', 10, 4);
            $table->float('c_po', 10, 5);
            $table->float('v_po', 10, 8);
            $table->float('ir_po', 10, 8);
            $table->float('k', 10, 7);
            $table->float('w', 10, 4);
            $table->float('ha', 10, 4);
            $table->float('hc', 10, 4);
            $table->float('t', 10, 4);
            $table->integer('bin')->nullable();
            $table->float('v_gr', 10, 8)->nullable();
            $table->float('delta_mv', 10, 8)->nullable();
            $table->float('v_min', 10, 8)->nullable();
            $table->float('v_max', 10, 8)->nullable();
            $table->float('v_average', 10, 8)->nullable();
            $table->string('v_status', 6)->nullable();
            $table->float('ir_gr', 10, 8)->nullable();
            $table->float('delta_ir', 10, 8)->nullable();
            $table->float('ir_min', 10, 8)->nullable();
            $table->float('ir_max', 10, 8)->nullable();
            $table->float('ir_average', 10, 8)->nullable();
            $table->string('ir_status', 6)->nullable();
            $table->string('frame_sn', 50)->nullable();
            $table->string('cell', 5)->nullable();
            $table->timestampsTz();
            $table->string('d_test')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_batts');
    }
}