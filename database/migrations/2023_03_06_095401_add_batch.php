<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_batts', function (Blueprint $table) {
            $table->integer('batch')->nullable();
            $table->string('po')->nullable();
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
            $table->dropColumn('batch');
            $table->dropColumn('po');
        });
    }
}
