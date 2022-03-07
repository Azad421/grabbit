<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_statuses', function (Blueprint $table) {
            $table->increments('status_id');
            $table->string('name', 25);
            $table->string('nickname', 25);
            $table->timestamps();
        });
        DB::table('job_statuses')->insert(['name'=> 'Pending', 'nickname' => 'pending']);
        DB::table('job_statuses')->insert(['name'=> 'Rejected', 'nickname' => 'rejected']);
        DB::table('job_statuses')->insert(['name'=> 'Approved', 'nickname' => 'approved']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_statuses');
    }
}
