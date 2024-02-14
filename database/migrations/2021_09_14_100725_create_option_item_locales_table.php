<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionItemLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_item_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('option_item_id');
            $table->foreign('option_item_id')->references('id')->on('option_items')->onDelete('cascade');
            $table->char('name',255);
            $table->char('locale',255);
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
        Schema::dropIfExists('option_item_locales');
    }
}
