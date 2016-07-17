<?php

use Illuminate\Database\Seeder;
use App\SettingGroup;

class SettingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingGroup::create([
          'name' => 'Chandler Bing',
          'pay_to' => 'Chandler Bing Inc.',
          'email' => 'chandler@example.com',
          'phone' => '212-123-4567',
          'address' => '123 Central Perk Road. New York, NY'
        ]);
    }
}
