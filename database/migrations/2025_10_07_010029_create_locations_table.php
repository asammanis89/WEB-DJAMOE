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
 // database/migrations/xxxx_xx_xx_xxxxxx_create_locations_table.php
public function up(): void
{
    Schema::create('locations', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('address');
        $table->string('phone_number')->nullable();
        $table->text('google_maps_url')->nullable();
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
        Schema::dropIfExists('locations');
    }
};
