<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->longText('detail');
            $table->string('photo');
            $table->float('price');
            $table->float('promotion_price')->nullable();
            $table->char('promotion_price_status', 1)->nullable();
            $table->integer('in_stock')->nullable();
            $table->integer('viewer')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('products');
    }
}
