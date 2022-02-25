<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomobileCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobile_categories', function (Blueprint $table) {
            $table->primary(['automobile_id', 'category_id']);
            $table->foreignId('automobile_id')->constrained('automobiles', 'id');
            $table->foreignId('category_id')->constrained('categories', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automobile_categories');
    }
}
