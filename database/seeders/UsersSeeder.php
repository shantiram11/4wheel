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
        User::factory(20)->create();
        User::upsert([
            [
            'name'                      => 'Shantiram Tiwari',
            'email'                     => 'shantiramtiwari0852@4wheel.test',
            'email_verified_at'         => now(),
            'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id'                   => $role->id,
            'remember_token'            => Str::random(10),
            'current_image'             => '1.jpg',
            'identity_front'             => '2.jpg',
            'identity_back'             => '3.jpg',
                'verify'             => 'yes',
            ],
            [
                'name'                      => 'Shantiram Tiwari',
                'email'                     => 'shantiramtiwari@gmail.com',
                'email_verified_at'         => now(),
                'current_image'             => 'user1.jpg',
                'identity_front'             => 'userback.jpg',
                'identity_back'             => 'userfront.jpg',
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'                   => $role->id,
                'remember_token'            => Str::random(10),
                'verify'             => 'yes',
                ],
            [
                'name'                      => 'sample user',
                'email'                     => 'sampleuser@gmail.com',
                'email_verified_at'         => now(),
                'current_image'             => '1.jpg',
                'identity_front'             => '2.jpg',
                'identity_back'             => '3.jpg',
                'password'                  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'                   => 3,
                'remember_token'            => Str::random(10),
                'verify'             => 'yes',
            ],
        ],['email'],[]);
    }
}
