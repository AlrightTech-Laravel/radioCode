<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (env('TRUNCATE_ON_SEED')) {
            Schema::disableForeignKeyConstraints();
            User::truncate();
            Schema::enableForeignKeyConstraints();

            DB::statement("ALTER TABLE users AUTO_INCREMENT = 21402;");
        }

        $users = [
            [
                'fname' => 'Administrator',
                'lname' => 'RC',
                'email' => 'admin@getmyradiocode.co.uk',
                'password' => Hash::make("123456789"),
                'status' => 1,
                'ip_address' => '127.0.0.1',
                'role' => 'admin',
            ],
        ];

        foreach ($users as $user) {
            $user_role = $user['role'] ?? 'standard user';
            unset($user['role']);

            $new_user = User::create($user);
            $new_user->assignRole($user_role);
        }
    }
}
