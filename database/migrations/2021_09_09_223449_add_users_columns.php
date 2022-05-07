<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable();
            $table->string('middle_name', 32)->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex', 6)->nullable();
            $table->string('weight', 6)->nullable();
            $table->string('height', 6)->nullable();
            $table->string('landline_number', 32)->nullable();
            $table->string('cellphone_number', 32)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('type', 19)->default('patient');
            $table->timestamp('blocked')->nullable();
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
            $table->dropColumn([
                'first_name',
                'last_name',
                'middle_name',
                'birth_date',
                'age',
                'sex',
                'weight',
                'height',
                'landline_number',
                'cellphone_number',
                'address',
                'type',
                'blocked',
            ]);
        });
    }
}
