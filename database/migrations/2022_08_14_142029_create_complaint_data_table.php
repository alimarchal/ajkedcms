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
        Schema::create('complaint_data', function (Blueprint $table) {
            $table->id();
            $table->integer('office_id')->nullable();
            $table->integer('opening_balance')->default(0);
            $table->integer('new')->default(0);
            $table->integer('in_process')->default(0);
            $table->integer('closed')->default(0);
            $table->integer('closing_balance')->default(0);
            $table->unsignedBigInteger('total')->default(0);
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
        Schema::dropIfExists('complaint_data');
    }
};
