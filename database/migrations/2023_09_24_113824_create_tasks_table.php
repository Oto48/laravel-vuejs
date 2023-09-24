<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->string('name', 50);
            $table->string('task_type', 100);
            $table->string('task', 250);
            $table->string('product', 250)->nullable();
            $table->time('scheduled_time')->nullable();
            $table->time('actual_time')->nullable();
            $table->date('finish_date')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
