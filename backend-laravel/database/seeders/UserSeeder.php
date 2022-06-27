<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // superadmin
        $superadminAccess = Role::where(['name' => 'superadmin'])->first();
        $userAccess = Role::where(['name' => 'user'])->first();
        $atqiya = User::updateOrCreate([
            'name' => ucwords('suherman atqiya'),
            'email' => 'atqiya@atqiyacode.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);

        $atqiya->assignRole($superadminAccess);

        // random user data seed
        for ($i = 0; $i <= 10; $i++) {
            $newUser = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null,
            ]);
            $newUser->assignRole($userAccess);
        }
    }
}
