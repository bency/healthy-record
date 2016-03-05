<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absorts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attribute_id');
            $table->decimal('value', 5, 2);
            $table->tinyInteger('absort');
            $table->integer('modified_at')->default(0);
            $table->integer('created_at');
            $table->integer('deleted_at')->nullable();
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('absorts');
    }
}
