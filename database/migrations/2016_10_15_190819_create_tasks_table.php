<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sort')->default(0);
            $table->dateTime('dueDate')->nullable();
            $table->dateTime('deferDate')->nullable();
            $table->dateTime('completedDate')->nullable();
            $table->boolean('completed')->default(0);
            $table->boolean('prioritised')->default(0);
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
        Schema::drop('tasks');
    }
}
