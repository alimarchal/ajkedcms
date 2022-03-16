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
            $table->date('complaint_date')->nullable();;
            $table->integer('office_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('subject');
            $table->text('description');
            $table->string('category')->nullable();;
            $table->string('district')->nullable();;
            $table->string('source')->nullable();;
            $table->string('name')->nullable();;
            $table->string('father_husband')->nullable();;
            $table->string('gender')->nullable();;
            $table->string('cnic')->nullable();;
            $table->string('office')->nullable();;
            $table->string('cell_number')->nullable();;
            $table->string('phone_number')->nullable();;
            $table->string('address')->nullable();;
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
