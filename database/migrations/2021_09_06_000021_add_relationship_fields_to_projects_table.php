<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->foreign('project_manager_id', 'project_manager_fk_4813788')->references('id')->on('project_managers');
        });
    }
}
