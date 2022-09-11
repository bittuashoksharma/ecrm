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
        Schema::create('employee_personal_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('father_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('phone_number_2')->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_address');
            $table->string('nationality');
            $table->string('maritial_status');
            $table->string('photo');
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
        Schema::dropIfExists('employee_personal_details');
    }
};
