<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('nickname', 25);
            $table->text('description');
            $table->timestamps();
        });

        DB::table('order_statuses')->insert(['name'=> 'Created', 'nickname' => 'created', 'description' => 'For Order']);
        DB::table('order_statuses')->insert(['name'=> 'Progressing', 'nickname' => 'progressing', 'description' => 'For Order']);
        DB::table('order_statuses')->insert(['name'=> 'Delivered', 'nickname' => 'delivered', 'description' => 'For Order']);
        DB::table('order_statuses')->insert(['name'=> 'Completed', 'nickname' => 'completed', 'description' => 'For Order']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
