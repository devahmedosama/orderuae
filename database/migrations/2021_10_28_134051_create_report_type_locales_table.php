<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTypeLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_type_locales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('report_type_id');
            $table->foreign('report_type_id')->references('id')->on('report_types')->onDelete('cascade');
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
        Schema::dropIfExists('report_type_locales');
    }
}
