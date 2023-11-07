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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');            
            $table->string('nama');
            $table->boolean('jk')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->integer('agama')->nullable();
            $table->unsignedBigInteger('pasangan_id')->nullable();
            $table->string('tglLahir')->nullable();
            $table->integer('anakKe')->nullable();
            $table->string('tglMeninggal')->nullable();
            $table->integer('meninggal')->default(0);
            $table->string('alamat')->nullable();
            $table->string('hp')->nullable();
            $table->string('foto')->nullable();
            $table->integer('status')->default(1);
            $table->integer('role')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('pasangan_id')->references('id')->on('pasangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
