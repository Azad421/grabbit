<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicroJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micro_jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('job_title', 255);
            $table->string('slug', 255);
            $table->integer('category')->unsigned();
            $table->text('description')->nullable();
            $table->string('job_duration');
            $table->string('image');
            $table->string('budget');
            $table->integer('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('category')
                ->references('category_id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('status_id')
                ->on('job_statuses')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('micro_jobs');
    }
}
