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

        // DB::table('users')->insert([
        // 	'name'=>'quan',
        // 	'email'=>'quanle@gmail.com',
        // 	'password'=>bcrypt('matkhau')
        // ]);
        $this->call(userSeeder::class);
    }
}
/**
 * 
 */
class userSeeder extends Seeder
{
	
	function run()
	{
        //user
		DB::table('users')->insert([
		 	['name'=>'quan','email'=>str_random(3).'@gmail.com','password'=>bcrypt('matkhau')],
		 	['name'=>'laravel','email'=>str_random(3).'@gmail.com','password'=>bcrypt('matkhau')], 
		 	['name'=>'PHP','email'=>str_random(3).'@gmail.com','password'=>bcrypt('matkhau')]
        ]);
        //sanpham
        DB::table('sanpham')->insert([
            ['ten'=>'Ipad 3','soluong'=>100],
            ['ten'=>'PC Gaming','soluong'=>100],
            ['ten'=>'Samsung galaxy 3','soluong'=>100],
            ['ten'=>'Ipad galaxy 4','soluong'=>100],
            ['ten'=>'Ipad galaxy 5','soluong'=>100],
            ['ten'=>'Ipad galaxy 6','soluong'=>100]
        ]);
         DB::table('loaisanpham')->insert([
            ['ten'=>'Apple'],
            ['ten'=>'PC'],
            ['ten'=>'DIEN THOAI'],
            ['ten'=>'Phu kien']
           
        ]);
	}
}