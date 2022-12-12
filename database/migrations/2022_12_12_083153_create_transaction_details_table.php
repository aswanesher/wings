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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('document_code')->length(3);
            $table->string('document_number')->length(10);
            $table->string('product_code')->length(18);
            $table->integer('price')->length(6);
            $table->integer('quantity')->length(6);
            $table->string('unit')->length(5);
            $table->integer('subtotal')->length(10);
            $table->string('currency')->length(5);
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
        Schema::dropIfExists('transaction_details');
    }
};
