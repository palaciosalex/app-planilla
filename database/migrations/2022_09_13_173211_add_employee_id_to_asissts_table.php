<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asissts', function (Blueprint $table) {
            $table->bigInteger('employee_id')->unsigned();
            $table
            ->foreign('employee_id')
            ->references('id')
            ->on('employees')
            ->after('hora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asissts', function (Blueprint $table) {
            //
        });
    }
};
