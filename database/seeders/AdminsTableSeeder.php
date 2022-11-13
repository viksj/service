<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRecords = [
            ['id'=>1,'name'=>'Super Admin','type'=>'supperadmin','vendor_id'=>'0','mobile'=>'9587159311','email'=>'admin@admin.in','password'=>Hash::make('123456'),'image'=>'','status'=>'1'],
        ];

        Admins::insert($adminRecords);
    }
}
