<?php

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phones = [
            ['id' => '0', 'manufacturerId' => '1', 'model' => 'Galaxy S7', 'year' => '2016', 'image' => 'images/phones/default.jpg'],
            ['id' => '0', 'manufacturerId' => '2', 'model' => 'iPhone 7', 'year' => '2016', 'image' => 'images/phones/default.jpg'],
            ['id' => '0', 'manufacturerId' => '3', 'model' => 'Lumia 620', 'year' => '2013', 'image' => 'images/phones/default.jpg'],
            ['id' => '0', 'manufacturerId' => '4', 'model' => 'P30 Pro', 'year' => '2019', 'image' => 'images/phones/default.jpg'],
        ];
    }
}
