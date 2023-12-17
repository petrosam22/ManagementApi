<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->string('email')->unique();
            $table->boolean('is_verify')->default(false);
            $table->string('password');
            $table->enum('status',['active','Inactive'])->default('active');
            $table->string('phone');
            $table->string('role')->default('admin');
            $table->string('city');
            $table->index('email');
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
        Schema::dropIfExists('admins');
    }
}
