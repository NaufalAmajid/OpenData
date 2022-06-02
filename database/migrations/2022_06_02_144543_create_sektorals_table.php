<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSektoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sektorals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sektor')->unique();
            $table->string('nama_sektor');
            $table->string('logo_sektor')->nullable();
            $table->text('deskripsi');
            $table->string('pembuat')->default('administrator');
            $table->integer('is_correct')->default(2);
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
        Schema::dropIfExists('sektorals');
    }
}
