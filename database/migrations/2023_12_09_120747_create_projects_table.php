<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Date;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('started')->default(Date::now());
            $table->date('ended');
            $table->date('time');
            $table->foreignId('team_id')->constrained();
            $table->foreignId('workspace_id')->constrained();
            $table->foreignId('owner_id')->constrained('members');
            $table->integer('progress');
            $table->foreignId('status_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->string('budget');
            $table->longText('description');
            $table->boolean('close')->default(false);
            $table->softDeletes();

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
        Schema::dropIfExists('projects');
    }
}
