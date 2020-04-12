<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $admins = [
            [
                'name'          => 'admin',
                'email'         => 'test@test.com',
                'password'      => 'admin123'
            ],
        ];
        foreach($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}
