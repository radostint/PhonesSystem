<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $manufacturers = [
            ['id' => '0', 'name' => 'Samsung', 'image' => 'images/manufacturers/default.jpg'],
            ['id' => '0', 'name' => 'Apple', 'image' => 'images/manufacturers/default.jpg'],
            ['id' => '0', 'name' => 'Nokia', 'image' => 'images/manufacturers/default.jpg'],
            ['id' => '0', 'name' => 'Huawei', 'image' => 'images/manufacturers/default.jpg'],
            ['id' => '0', 'name' => 'Xiaomi', 'image' => 'images/manufacturers/default.jpg'],
            ['id' => '0', 'name' => 'Lenovo', 'image' => 'images/manufacturers/default.jpg'],
            ['id' => '0', 'name' => 'Motorola', 'image' => 'images/manufacturers/default.jpg'],
        ];
        DB::table('manufacturers')->insert($manufacturers);
    }
}
