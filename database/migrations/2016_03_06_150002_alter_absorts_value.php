<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAbsortsValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absorts', function (Blueprint $table) {
            $table->decimal('value', 7, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absorts', function (Blueprint $table) {
            $table->decimal('value', 5, 2);
        });
    }
}
