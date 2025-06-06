<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_template', function (Blueprint $table) {
            // Ubah receive_date menjadi integer (misalnya UNIX timestamp)
            $table->unsignedBigInteger('receive_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_template', function (Blueprint $table) {
            // Balikkan kembali ke datetime jika dibutuhkan
            $table->dateTime('receive_date')->change();
        });
    }
};
