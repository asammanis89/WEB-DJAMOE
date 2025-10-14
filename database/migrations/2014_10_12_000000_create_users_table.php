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
        $table->id('id_user'); // Menggunakan id_user sebagai primary key
        $table->string('username')->unique(); // unique() agar tidak ada username yang sama
        $table->string('password');
        $table->rememberToken(); // Disarankan oleh Laravel untuk keamanan
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
