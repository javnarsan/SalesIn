<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicles', function (Blueprint $table) {
<<<<<<< HEAD
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
=======
            $table->BigIncrements('id');
>>>>>>> 7fd85a1e4ec2d718de51fa70ab063d52815ff37e
            $table->string('name',255);
            $table->string('img',255);
            $table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('cicles');
    }
}
