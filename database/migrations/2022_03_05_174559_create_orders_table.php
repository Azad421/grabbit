<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->double('amount', 8, 2);
            $table->enum('payment',['notPaid', 'paid'])->nullable();
            $table->integer('quantity');
            $table->integer('duration');
            $table->string('order_note', 255)->nullable();
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('job_id')->references('job_id')->on('micro_jobs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status')->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
