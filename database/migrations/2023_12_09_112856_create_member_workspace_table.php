<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberWorkspaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_workspace', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members');
            $table->foreignId('workspace_id')->constrained('workspaces');

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
        Schema::dropIfExists('member_workspace');
    }
}
