<?php
namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UserSeed extends Seeder
{
    public function run()
    {
        DB::table((new User)->getTable())->truncate();

        User::insert([
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('iloveyou'),
                'role_id'        => 1,
                'dept_id'        => 1,
                'remember_token' => '',
            ],
            [
                'id'             => 2,
                'name'           => 'Fetia Adu',
                'email'          => 'fetiadu@gmail.com',
                'password'       => Hash::make('iloveyou'),
                'role_id'        => 2,
                'dept_id'        => 1,
                'remember_token' => '',
            ],
            // [
            //     'id'             => 2,
            //     'name'           => 'Glenn Azuelo',
            //     'email'          => 'glenn@gmail.com',
            //     'password'       => Hash::make('iloveyou'),
            //     'role_id'        => 2,
                    // 'dept_id'        => 1,
            //     'remember_token' => '',
            // ],
            // [
            //     'id'             => 2,
            //     'name'           => 'Princely Cezar',
            //     'email'          => 'prince@gmail.com',
            //     'password'       => Hash::make('iloveyou'),
            //     'role_id'        => 2,
            //     'remember_token' => '',
            // ],
            // [
            //     'id'             => 2,
            //     'name'           => 'Caren autista',
            //     'email'          => 'jude@gmail.com',
            //     'password'       => Hash::make('iloveyou'),
            //     'role_id'        => 2,
            //     'remember_token' => '',
            // ],

            [
                'id'             => 3,
                'name'           => 'Million Sime',
                'email'          => 'simemillion@gmail.com',
                'password'       => Hash::make('iloveyou'),
                'role_id'        => 3,
                'dept_id'        => 1,
                'remember_token' => '',
            ]
        ]);
    }
}
