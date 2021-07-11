<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('visitor_id')->constrained();
            $table->foreignId('residential_unit_id')->constrained();
            // $table->unsignedBigInteger('visitor_id');
            // $table->foreign('visitor_id')
            //     ->references('id')
            //     ->on('visitors')
            //     ->onDelete('cascade');

            // $table->unsignedBigInteger('residential_unit_id');
            // $table->foreign('residential_unit_id')
            //     ->references('id')
            //     ->on('residential_units')
            //     ->onDelete('cascade');

            $table->timestamp('entered_time')->useCurrent();
            $table->timestamp('exit_time')->nullable();

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
        Schema::dropIfExists('visits');
    }
}
