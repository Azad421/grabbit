<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('status_id');
            $table->string('name', 25);
            $table->string('nickname', 25);
            $table->text('description');
            $table->timestamps();
        });

        DB::table('statuses')->insert(['name'=> 'Active', 'nickname' => 'active', 'description' => 'For Category']);
        DB::table('statuses')->insert(['name'=> 'Inactive', 'nickname' => 'inactive', 'description' => 'For Category']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
