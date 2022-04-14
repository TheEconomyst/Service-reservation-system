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
        Schema::create('field_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('text_option');
            $table->integer('integer_option');
            $table->foreignId('resevation_id')->constrained('reservations');
            $table->foreignId('form_field_id')->constrained('form_fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_options');
    }
};
