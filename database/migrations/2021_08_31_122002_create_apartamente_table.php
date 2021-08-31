<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartamenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartamente', function (Blueprint $table) {
            $table->id();
            $table->integer('cladiri_id');
            $table->integer('proprietari_id')->nullable();
            $table->string('etaj');
            $table->string('numar');
            $table->float('suprafata');
            $table->string('numar_camere');
            $table->boolean('vedere')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('apartamente');
    }
}
