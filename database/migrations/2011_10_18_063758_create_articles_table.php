<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id',10);
            $table->text('title');		
            $table->string('image',255);
            $table->boolean('deleted')->default(0);
            $table->text('description');
<<<<<<< HEAD
            $table->unsignedBigInteger('cicles_id');
            $table->foreign('cicles_id')->references('id')->on('cicles');
=======
            $table->unsignedBigIncrements("cicles_id")->refenreces('id')->on('cicles');
>>>>>>> 7fd85a1e4ec2d718de51fa70ab063d52815ff37e
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
        Schema::dropIfExists('articles');
    }
}
