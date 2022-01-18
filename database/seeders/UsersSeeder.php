<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Str;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','superAdmin')->first();
        User::upsert([
            [
            'name'                      => 'Shantiram Tiwari',
            'email'                     => 'shantiramtiwari0852@4wheel.test',
            'email_verified_at'         => now(),
            'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id'                   => $role->id,
            'remember_token'            => Str::random(10),
            ]
        ],['email'],[]);
    }
}
