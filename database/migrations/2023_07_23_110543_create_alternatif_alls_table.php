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
        Schema::create('alternatif_alls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kriteria');
            $table->integer('id_subkriteria');
            $table->string('name_warga');
            
            $table->timestamps();
            // $table->string('k_pekerjaan');
            // $table->string('k_penghasilan');
            // $table->string('k_rumah');
            // $table->string('k_tanggungan');
            // $table->string('k_domisili');
            
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternatif_alls');
    }
};
