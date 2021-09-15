<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('id_account');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('estado');
            $table->dateTime('last_access')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('role_id');

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id_role')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
