<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

class SeedAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::create([
            'name' => 'superadmin',
            'first_name' => 'super',
            'last_name' => 'admin',
            'type' => 'admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'),
        ]);


    }
}
