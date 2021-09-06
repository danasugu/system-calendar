<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectManagersTable extends Migration
{
    public function up()
    {
        Schema::create('project_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surnane');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
