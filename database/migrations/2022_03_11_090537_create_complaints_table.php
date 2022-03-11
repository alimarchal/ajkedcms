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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->date('complaint_date');
            $table->integer('office_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('subject');
            $table->text('description');
            $table->string('category');
            $table->string('district');
            $table->string('source');
            $table->string('name');
            $table->string('father_husband');
            $table->string('gender');
            $table->string('cnic');
            $table->string('cell_number');
            $table->string('phone_number');
            $table->string('address');
            $table->enum('status',['New','In Process','Closed'])->default('New');
            $table->text('file_attachments');
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
        Schema::dropIfExists('complaints');
    }
};
