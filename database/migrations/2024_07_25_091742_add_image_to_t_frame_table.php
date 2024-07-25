<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToTFrameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_frame', function (Blueprint $table) {
            $table->string('image')->after('ts')->nullable(); // Adds 'image' column after 'ts' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_frame', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
