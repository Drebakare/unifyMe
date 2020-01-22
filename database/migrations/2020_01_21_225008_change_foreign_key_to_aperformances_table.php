<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignKeyToAperformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aperformances', function (Blueprint $table) {
            $table->unsignedBigInteger('semester_year_id')->nullable();
            $table->foreign('semester_year_id')->references('id')->on('semester_years');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aperformances', function (Blueprint $table) {
            //
        });
    }
}
