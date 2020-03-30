<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->bigIncrements('id');
            $table->enum('role', ['Admin', 'Concessionaire']);
            $table->string('firstname', 50);
            $table->string('middlename', 50);
            $table->string('lastname', 50);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('catering', 50)->nullable();
            $table->string('contactno', 20);
            $table->string('coverphoto', 200);
            $table->string('username', 20)->unique();
            $table->string('password', 256);
            $table->bigInteger('campus_id')->nullable()->unsigned();
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->enum('Status', ['Active', 'Deactivated']);
            $table->rememberToken();
            $table->timestamps();
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
