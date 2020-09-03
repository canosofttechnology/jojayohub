<?php

use Illuminate\Database\Seeder;

class WholesalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wholesales')->insert([
            [
            'name' => 'Bundle'
            ],[
                'name' => 'Piece'
            ],[
                'name' => 'Roll'
            ]]
        );
    }
}
