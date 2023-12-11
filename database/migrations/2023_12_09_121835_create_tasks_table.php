<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Date;
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('started')->default(Date::now());
            $table->date('ended');
            $table->string('duration');
            $table->enum('Priority',['low','high','medium']);
            $table->string('photo');
            $table->softDeletes();
            $table->foreignId('project_id')->constrained('members');
            $table->foreignId('team_id')->constrained('members');
            $table->foreignId('status_id')->constrained('members');
            $table->foreignId('tag_id')->constrained('members');
            $table->foreignId('owner_id')->constrained('members');
            $table->foreignId('assignTo')->constrained('members');

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
        Schema::dropIfExists('tasks');
    }
}
