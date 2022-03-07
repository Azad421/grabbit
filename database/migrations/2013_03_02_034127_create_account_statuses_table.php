<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->string('nickname', 25);
            $table->timestamps();
        });
        DB::table('account_statuses')->insert(['name'=> 'Pending', 'nickname' => 'pending']);
        DB::table('account_statuses')->insert(['name'=> 'Approved', 'nickname' => 'approved']);
        DB::table('account_statuses')->insert(['name'=> 'Rejected', 'nickname' => 'rejected']);
        DB::table('account_statuses')->insert(['name'=> 'Deactivated', 'nickname' => 'deactivated']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_statuses');
    }
}
