<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id')->unsigned()->autoIncrement();
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->date('birthdate');
            $table->string('report_subject', 50);
            $table->string('country', 50);
            $table->string('phone', 30);
            $table->string('email', 50)->unique();
            $table->string('company', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->text('about_me')->nullable();
            $table->string('photo', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
