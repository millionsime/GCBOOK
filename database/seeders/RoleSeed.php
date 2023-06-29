<?php
namespace Database\Seeders;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class RoleSeed extends Seeder
{
    public function run()
    {
        DB::table((new Role)->getTable())->truncate();

        Role::insert([
            [
                'id'    => 1,
                'title' => 'Administrator (can create other users)',
            ],
            [
                'id'    => 2,
                'title' => 'Student',
            ],
            [
                'id'    => 3,
                'title' => 'Teacher',
            ],
        ]);
    }
}
