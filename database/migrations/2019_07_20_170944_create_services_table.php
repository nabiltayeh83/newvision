<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('projectname');
            $table->string('customername');
            $table->integer('category_id');
            $table->text('stages')->nullable();
            $table->string('period')->nullable();
            $table->string('year')->nullable();
            $table->string('vedio')->nullable();
            $table->string('filetitle')->nullable();
            $table->string('fileattach')->nullable();
            $table->string('image');
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('services');
    }
}
