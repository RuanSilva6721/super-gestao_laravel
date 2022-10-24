<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProductsFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();

            $table->string('filial', 30);
            $table->timestamps();
        });


        Schema::create('products_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('product_id');
            $table->float('price', 8, 2);
            $table->integer('minimum_stock');
            $table->integer('maximum_stock');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('filial_id')->references('id')->on('filiais');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price', 'minimum_stock', 'maximum_stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('price', 8, 2)->default(0.01);
            $table->integer('minimum_stock')->default(1);
            $table->integer('maximum_stock')->default(1);
        });

        Schema::dropIfExists('products_filiais');
        Schema::dropIfExists('filiais');
    }
}