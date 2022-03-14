<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review');
            $table->bigInteger('from_user')->unsigned();
            $table->bigInteger('job_id')->unsigned();
            $table->bigInteger('to_user')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->text('comments');
            $table->integer('rating');
            $table->enum('status', ['accepted', 'rejected']);
            $table->timestamps();

            $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('job_id')->on('micro_jobs')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
