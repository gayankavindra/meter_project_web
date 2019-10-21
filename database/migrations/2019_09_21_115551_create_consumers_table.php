<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            table>increments('id');
            table>string('email');
            table>string('consumername');
            table>string('nic')->uniue();
            table>string('contact');
            table>string('Address');
            table>timestamps();
        //     $table->increments('id');
        //    $table->string('nic')->unique();
          
        //     $table->string('consumername');
        //     $table->string('email');
        //     $table->string('contact');
        //     $table->string('address');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
