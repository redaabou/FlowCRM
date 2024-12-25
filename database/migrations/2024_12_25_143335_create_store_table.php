<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id('id'); // id bigint primary key
            $table->unsignedBigInteger('id_product'); // id_item references items table
            $table->unsignedBigInteger('id_manager'); // id_manager references employees table
            $table->integer('quantite_stock'); // quantite_stock as integer
            $table->timestamps();

            // Set foreign key constraints
            $table->foreign('id_product')->references('id_item')->on('items')->onDelete('cascade');
            $table->foreign('id_manager')->references('id')->on('employees')->where('role', 'manager_store')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
}
};
