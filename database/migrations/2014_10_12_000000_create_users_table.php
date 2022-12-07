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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nis')->unique();
            $table->string('name');
            $table->string('email')->nullabel();
            $table->string('foto')->nullabel();
            $table->string('tanggal');
            $table->string('tempat')->nullabel();
            $table->string('komplek')->default('');
            $table->string('alamat')->nullabel();
            $table->string('ibu')->nullabel();
            $table->string('ayah')->nullabel();
            $table->string('no')->nullabel();
            $table->string('nowali')->nullabel();
            $table->string('remote')->default('1');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('kelas');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
