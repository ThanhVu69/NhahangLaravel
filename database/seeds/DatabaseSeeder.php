<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'Đặng Thị Lệ',
                'email'=>'le.dt1994@gmail.com',
                'password'=>bcrypt('12345678'),
                'SDT'=>'0123456789',
                'DiaChi'=>'KTX Đại học Thủy Lợi',
                'quyen'=> '1',
                'ChucVu'=>'Quản Lý'
            ]
        );
    }
}
