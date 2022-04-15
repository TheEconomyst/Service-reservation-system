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
        Schema::create('field_choices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("choice");
            $table->foreignId('form_field_id')->constrained('form_fields');
            $table->foreignId('resevation_id')->constrained('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_choices');
    }
};
