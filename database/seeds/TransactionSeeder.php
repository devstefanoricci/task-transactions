<?php
/**
 * Created by PhpStorm.
 * User: stefano
 * Date: 24/10/2020
 * Time: 17:41
 */

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Transaction::class, 50)->create();
    }
}