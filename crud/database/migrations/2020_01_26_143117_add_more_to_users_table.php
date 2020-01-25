<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar', 100)->nullable();
            $table->enum('gender',['male','female'])->nullable()->after('email');
            $table->date('date_of_birth')->nullable();
            $table->string('temp_address',50)->nullable();;
            $table->string('perm_address',50)->nullable();;
            $table->string('contact',15)->nullable();
            $table->unsignedBigInteger('role_id');

            $table->foreign('role_id')->references('id')->on('roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('temp_address');
            $table->dropColumn('perm_address');
            $table->dropColumn('contact');
        });
    }
}
