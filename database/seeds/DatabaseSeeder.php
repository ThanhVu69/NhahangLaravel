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
                'name'=>'Nguyễn Việt Hoàng',
                'email'=>'hoangvn1810@gmail.com',
                'password'=>bcrypt('12345678'),
                'SDT'=>'0123456789',
                'DiaChi'=>'Cầu Giấy',
                'quyen'=> '1',
                'ChucVu'=>'Quản Lý',
            ]
        );
    }
}
