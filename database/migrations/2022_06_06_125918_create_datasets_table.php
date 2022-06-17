<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->string('judul_dataset');
            $table->string('kode_dataset');
            $table->string('pembuat');
            $table->string('kode_sektoral');
            $table->string('kode_organisasi');
            $table->string('kode_tag');
            $table->string('versi_dataset')->default('1.0');
            $table->string('pengelola')->nullable();
            $table->string('lisensi')->nullable();
            $table->string('sumber')->nullable();
            $table->integer('is_publish')->default(0);
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
        Schema::dropIfExists('datasets');
    }
}
