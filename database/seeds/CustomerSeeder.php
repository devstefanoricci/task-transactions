<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 24/10/2020
 * Time: 17:40
 */

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 10)->create();
    }
}