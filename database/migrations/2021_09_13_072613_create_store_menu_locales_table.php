<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreMenuLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_menu_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('locale',255);
            $table->char('name',255);
            $table->unsignedBigInteger('store_menu_id');
            $table->foreign('store_menu_id')->references('id')->on('store_menus')->onDelete('cascade');
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
        Schema::dropIfExists('store_menu_locales');
    }
}
