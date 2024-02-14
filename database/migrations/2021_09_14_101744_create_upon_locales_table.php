<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUponLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upon_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name',255);
            $table->char('locale',255);
            $table->unsignedBigInteger('upon_id');
            $table->foreign('upon_id')->references('id')->on('upons')->onDelete('cascade');
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
        Schema::dropIfExists('upon_locales');
    }
}
