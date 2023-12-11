<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('started');
            $table->date('ended')->nullable();
            $table->string('duration')->nullable();
            $table->integer('lessons')->default(0);
            $table->string('photo');
            $table->foreignId('status_id')->constrained();
            $table->boolean('remainder')->default(false);
            $table->boolean('finish')->default(false);
            $table->foreignId('member_id')->constrained();
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
        Schema::dropIfExists('courses');
    }
}
