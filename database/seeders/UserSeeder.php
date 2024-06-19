<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $faker = \Faker\Factory::create();
        $role_admin = Role::create(['name' => 'admin']);
        $role_jury = Role::create(['name' => 'jury']);
        $role_pimpinan = Role::create(['name' => 'director']);
        $permission_admin = Permission::create(['name' => 'all']);
        $permission_jury = Permission::create(['name' => 'assessment']);

        $role_admin->givePermissionTo($permission_admin);
        $permission_admin->assignRole($role_admin);

        $role_jury->givePermissionTo($permission_jury);
        $permission_jury->assignRole($role_jury);

        $role_pimpinan->givePermissionTo($permission_admin);
        $permission_admin->assignRole($role_pimpinan);

        // Add the master administrator, user id of 1
        $users = [
            [
                'first_name'        => 'Super',
                'last_name'         => 'Admin',
                'name'              => 'Super Admin',
                'email'             => 'super@admin.com',
                'password'          => Hash::make('secret'),
                'username'          => '100001',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Pimpinan',
                'last_name'         => 'Perusahaan',
                'name'              => 'Pimpinan',
                'email'             => 'super@pimpinan.com',
                'password'          => Hash::make('secret'),
                'username'          => '100001',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Deno',
                'last_name'         => 'Mandrial',
                'name'              => 'Deno Mandrial',
                'email'             => 'deno@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri001',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Yunus',
                'last_name'         => 'Yanuar',
                'name'              => 'Yunus Yanuar',
                'email'             => 'yunus@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri002',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Adi',
                'last_name'         => 'Fatkhurrohman',
                'name'              => 'Adi Fatkhurrohman',
                'email'             => 'adi@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri003',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Didiet',
                'last_name'         => 'Joko Susilo',
                'name'              => 'Didiet Joko Susilo',
                'email'             => 'didiet@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri004',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Dedy',
                'last_name'         => 'Ermawanto',
                'name'              => 'Dedy Ermawanto',
                'email'             => 'dedy@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri005',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Muyasaroh',
                'last_name'         => 'Effendi',
                'name'              => 'Muyasaroh Effendi',
                'email'             => 'muyasaroh@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri006',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Anon',
                'last_name'         => 'Sulistyo',
                'name'              => 'Anon Sulistyo',
                'email'             => 'anon@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri007',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Bayu',
                'last_name'         => 'Pratama P.',
                'name'              => 'Bayu Pratama P.',
                'email'             => 'bayu@juri.com',
                'password'          => Hash::make('secret'),
                'username'          => 'juri008',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        foreach ($users as $user_data) {
            $user = User::create($user_data);
            if($user_data['email'] == 'super@admin.com'){
                $user->assignRole($role_admin);
            }else if($user_data['email'] == 'super@pimpinan.com'){
                $user->assignRole($role_pimpinan);
            }else{
                $user->assignRole($role_jury);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
