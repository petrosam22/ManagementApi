<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->string('email')->unique();
            $table->softDeletes();
            $table->boolean('is_verify')->default(false);
            $table->string('password');
            $table->string('position');
            $table->enum('status',['active','Inactive']);
            $table->string('company');
            $table->string('phone');
            $table->string('contract');
            $table->enum('role',['member','supervisor','admin','client']);
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
        Schema::dropIfExists('members');
    }
}
