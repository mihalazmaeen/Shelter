<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foundation_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('amount');
            $table->string('card_transaction')->nullable();
            $table->string('bkash_transaction')->nullable();
            $table->string('card')->nullable();
            $table->string('bkash')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
