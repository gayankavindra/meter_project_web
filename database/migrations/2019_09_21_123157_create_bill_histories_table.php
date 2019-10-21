<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_histories', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->string('accountno');
            $table->string('month');
            $table->string('billvalue');
            $table->string('nic')->unique();
            $table->string('contact');
            $table->timestamps();

            // $table->bigIncrements('id');
            // $table->string('billid')->unique();
            
        
            // $table->unsignedBigInteger('accountno');
            // $table->foreign('accountno')->references('accountno')->on('account_information')->onDelete('cascade');
            

            // $table->string('month');
            // $table->string('billvalue');
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_histories');
    }
}
