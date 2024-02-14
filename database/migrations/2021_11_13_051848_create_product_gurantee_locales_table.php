<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGuranteeLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_gurantee_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_gurantee_id');
            $table->foreign('product_gurantee_id')->references('id')->on('product_gurantees')->onDelete('cascade');
            $table->char('locale',255);
            $table->char('name',255);
            $table->text('text');
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
        Schema::dropIfExists('product_gurantee_locales');
    }
}
