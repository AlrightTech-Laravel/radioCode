<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->foreignId('created_by_id')->nullable();
            $table->string('fname', 125);
            $table->string('lname', 125);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone', 25)->nullable();
            $table->string('avatar')->nullable();
            $table->integer('status')->default(0);
            $table->string('ip_address', 45)->nullable();
            $table->string('last_login_ip', 45)->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE users AUTO_INCREMENT = 21402;");
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
