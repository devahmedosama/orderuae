<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFilterLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_filter_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_filter_id');
            $table->foreign('category_filter_id')->references('id')->on('category_filters')->onDelete('cascade');
            $table->char('locale',255);
            $table->char('name',255);
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
        Schema::dropIfExists('category_filter_locales');
    }
}
