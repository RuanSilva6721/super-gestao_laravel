<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unity', 5);
            $table->string('descrption', 30);

            $table->timestamps();
        });

        Schema::table('products', function(Blueprint $table){
            $table->unsignedBigInteger('unity_id');
            $table->foreign('unity_id')->references('id')->on('units');
        });

        Schema::table('products_details', function(Blueprint $table){
            $table->unsignedBigInteger('unity_id');
            $table->foreign('unity_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_details', function(Blueprint $table){

            $table->dropForeign('products_details_unity_id_foreign');
            $table->dropColumn('unity_id');

        });
        Schema::table('products', function(Blueprint $table){

            $table->dropForeign('products_unity_id_foreign');
            $table->dropColumn('unity_id');

        });



        Schema::dropIfExists('units');
    }
}
