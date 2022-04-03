<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 50);
            $table->string('email', 50)->unique();
            $table->string('verification_code', 100)->nullable();
            $table->integer('is_verified')->nullable();
            $table->string('password', 100);
            $table->timestamps();
        });
        Admin::create(['user_name' => 'Admin', 'email' => 'admin@gmail.com','is_verified'=> 1, 'password' => Hash::make('admin')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
