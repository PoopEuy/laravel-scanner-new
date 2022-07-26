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
            $table->float('ir_po', 10, 5);
            $table->float('k', 10, 7);
            $table->float('w', 10, 4);
            $table->float('ha', 10, 4);
            $table->float('hc', 10, 4);
            $table->float('t', 10, 4);
            $table->integer('bin');
            $table->float('v_gr', 10, 8)->nullable();
            $table->float('ir_gr', 10, 5)->nullable();
            $table->string('frame_sn', 50)->nullable();
            $table->string('cell', 3)->nullable();
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