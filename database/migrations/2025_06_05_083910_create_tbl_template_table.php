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
        Schema::create('tbl_template', function (Blueprint $table) {
            $table->id();
            $table->string('cabang', 100);
            $table->string('mo_number', 50);
            $table->string('dn_number', 50);
            $table->string('item_code', 50);
            $table->string('branch', 500);
            $table->string('awb_number', 50);
            $table->dateTime('receive_date');
            $table->string('receive_name', 50);
            $table->integer('receve_time');
            $table->string('expedition_name', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_template');
    }
};
