<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->string('name', 50);
            $table->string('statistics_name', 100);
            $table->string('dimension', 250)->nullable();
            $table->decimal('quantity', 10, 2)->nullable();
            $table->string('quota', 250)->nullable();
            $table->string('note', 250)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
