<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('gender');
            $table->foreignId('category_id');
            $table->foreignId('division_id');
            $table->foreignId('status_id');
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
        Schema::dropIfExists('data_employees');
    }
}
