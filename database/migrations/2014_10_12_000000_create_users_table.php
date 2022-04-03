<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('image', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('village', 255)->nullable();
            $table->string('contact_no', 255)->nullable();
            $table->bigInteger('user_role')->unsigned();
            $table->string('email', 255)->unique()->nullable();
            $table->string('password', 255)->nullable();
            $table->text('about_me')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('nid_num')->nullable();
            $table->string('qualification', 255)->nullable();
            $table->bigInteger('acc_status')->default(1)->unsigned();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('acc_status')
                ->references('id')
                ->on('account_statuses')
                ->onDelete('cascade');
            $table->foreign('user_role')
                ->references('id')
                ->on('user_roles')
                ->onDelete('cascade');
        });
        User::create(['first_name' => 'Employee', 'last_name' => 'Dev', 'image' => 'profile.png', 'gender' => 'Male','user_role' => 2,'email' => 'demoemployee@gmail.com','is_verified'=> 1, 'password' => Hash::make('password'), 'acc_status' => 2]);
        User::create(['first_name' => 'Job', 'last_name' => 'Seeker', 'image' => 'profile.png', 'gender' => 'Male','user_role' => 1,'email' => 'demojobseeker@gmail.com','is_verified'=> 1, 'password' => Hash::make('password'), 'acc_status'=> 2]);
        User::create(['first_name' => 'Demo', 'last_name' => 'Seeker', 'image' => 'profile.png', 'gender' => 'Male','user_role' => 1,'email' => 'demo@gmail.com','is_verified'=> 1, 'password' => Hash::make('password'), 'acc_status'=> 2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
