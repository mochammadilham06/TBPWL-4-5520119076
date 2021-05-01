<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('brands_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('harga');
            $table->string('pembeli', 100);
            $table->char('stok');
            $table->bigInteger('total');
            $table->timestamps();


            $table->foreign('harga')
            ->references('harga')
            ->on('products')
            ->onUpdate('cascade');
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
