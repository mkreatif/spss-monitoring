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
        Schema::create('tbl_matching', function (Blueprint $table) {
            $table->id();
            $table->string('cabang', 50);
            $table->string('mo_number', 50);
            $table->unsignedBigInteger('dn_number');
            $table->string('item_code', 50);
            $table->string('branch', 500);
            $table->string('awb_number', 50);
            $table->dateTime('receive_date');
            $table->string('receive_name', 50);
            $table->integer('receve_time');
            $table->string('expedition', 50);
            $table->boolean('is_need_matching');
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
        Schema::dropIfExists('tbl_matching');
    }
};
