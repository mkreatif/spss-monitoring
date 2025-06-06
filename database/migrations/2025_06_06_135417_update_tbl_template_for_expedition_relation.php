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
            // Hapus kolom lama
            $table->dropColumn('expedition_name');

            // Tambahkan kolom baru yang relasi
            $table->unsignedBigInteger('expedition_id')->after('receve_time');

            // Kolom tambahan
            $table->boolean('is_need_matching')->default(false)->after('expedition_id');
            $table->string('item_description')->nullable()->after('item_code');

            // Foreign key ke tbl_expedisi
            $table->foreign('expedition_id')->references('id')->on('tbl_expedisi')->onDelete('cascade');
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
            // Hapus foreign key dan kolom baru
            $table->dropForeign(['expedition_id']);
            $table->dropColumn(['expedition_id', 'is_need_matching', 'item_description']);

            // Tambahkan kembali kolom lama
            $table->string('expedition_name', 10)->after('receve_time');
        });
    }
};
