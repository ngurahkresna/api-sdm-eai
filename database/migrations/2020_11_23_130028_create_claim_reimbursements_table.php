<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimReimbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_reimbursements', function (Blueprint $table) {
            $table->increments('claim_id');
            $table->foreignId('employee_id');
            $table->string('title');
            $table->string('description');
            $table->string('proff_of_payment');
            $table->date('date');
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
        Schema::dropIfExists('claim_reimbursements');
    }
}
