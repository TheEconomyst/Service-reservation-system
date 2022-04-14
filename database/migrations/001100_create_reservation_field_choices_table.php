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
        Schema::create('reservation_field_choices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('field_choice_id')->constrained('field_choices');
            $table->foreignId('reservation_id')->constrained('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_field_choices');
    }
};
