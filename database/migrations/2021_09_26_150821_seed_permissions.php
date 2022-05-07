<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class SeedPermissions extends Migration
{

    public function processSeeder($model)
    {
        $permissions = [
            'view ' . $model,
            'view any ' . $model,
            'create ' . $model,
            'update ' . $model,
            'delete ' . $model,
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'group' => Str::plural($model),
            ]);
        }

    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    $permissions = [
            'user',
            'permission',
            'role',
            'client application',
            'patient',
            'diagnosis',
            'medicines',
            'symptoms',
            'admin account',
            'message',
            'status',
        ];

        foreach ($permissions as $model) {
            $this->processSeeder($model);
        }

    }

}
