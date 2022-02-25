<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomobileTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobile_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('automobile_id')->constrained('automobiles', 'id');
            $table->foreignId('tips_id')->constrained('tips', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automobile_tips');
    }
}
