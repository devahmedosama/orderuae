<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('locale',255);
            $table->char('name',255);
            $table->unsignedBigInteger('product_size_id');
            $table->foreign('product_size_id')->references('id')->on('product_sizes')->onDelete('cascade');
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
        Schema::dropIfExists('product_size_locales');
    }
}
