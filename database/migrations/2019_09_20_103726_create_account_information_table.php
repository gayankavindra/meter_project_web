<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_information', function (Blueprint $table) {
            $table->bigIncrements('id');

            table>string('accountno');
            table>string('totaldueamount')->default(0);
            table>string('consumername');
            table>string('nic');
            table>string('contact')->unique();
            table>string('Address')->unique();
            
        //    $table->string('accountno')->unique();
        //     $table->string('totaldueamount')->default(0); 
           
        //     $table->unsignedBigInteger('consumer_nic');
        //     $table->foreign('consumer_nic')->references('nic')->on('bill_histories')->onDelete('cascade');
        //     $table->string('contact');
        //     $table->string('address')->unique();
        //     $table->string('accounttype')->default(0);


        //     $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_information');
    }
}
