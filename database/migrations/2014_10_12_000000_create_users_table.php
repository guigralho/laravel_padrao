<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $userStatus = collect(\BeBack\Constants\UserStatusConstant::getConstants());

            $table->increments('id');
            $table->integer('user_group_id')->unsigned();
            $table->enum('status', $userStatus->toArray())->default($userStatus->first());
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->integer('user_created_id')->nullable()->unsigned();
            $table->integer('user_updated_id')->nullable()->unsigned();
            $table->integer('user_deleted_id')->nullable()->unsigned();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_group_id')->references('id')->on('user_groups');
            $table->foreign('user_created_id')->references('id')->on('users');
            $table->foreign('user_updated_id')->references('id')->on('users');
            $table->foreign('user_deleted_id')->references('id')->on('users');
        });
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
