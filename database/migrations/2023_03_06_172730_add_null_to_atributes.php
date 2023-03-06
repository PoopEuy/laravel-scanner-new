<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullToAtributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_batts', function (Blueprint $table) {
            $table->string('capa_grad')->unsigned()->nullable()->change();
            $table->string('crtn_sern')->unsigned()->nullable()->change();
            $table->float('m')->unsigned()->nullable()->change();
            $table->float('c_po')->unsigned()->nullable()->change();
            $table->float('v_po')->unsigned()->nullable()->change();
            $table->float('ir_po')->unsigned()->nullable()->change();
            $table->float('k')->unsigned()->nullable()->change();
            $table->float('w')->unsigned()->nullable()->change();
            $table->float('ha')->unsigned()->nullable()->change();
            $table->float('hc')->unsigned()->nullable()->change();
            $table->float('t')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_batts', function (Blueprint $table) {
            $table->string('capa_grad')->unsigned()->nullable(false)->change();
            $table->string('crtn_sern')->unsigned()->nullable(false)->change();
            $table->float('m')->unsigned()->nullable(false)->change(false);
            $table->float('c_po')->unsigned()->nullable(false)->change();
            $table->float('v_po')->unsigned()->nullable(false)->change();
            $table->float('ir_po')->unsigned()->nullable(false)->change();
            $table->float('k')->unsigned()->nullable(false)->change();
            $table->float('w')->unsigned()->nullable(false)->change();
            $table->float('ha')->unsigned()->nullable(false)->change();
            $table->float('hc')->unsigned()->nullable(false)->change();
            $table->float('t')->unsigned()->nullable(false)->change();
        });
    }
}
