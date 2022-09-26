<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Product::factory(10)->create();

        Card::factory(10)->create();

        $this->call(LaratrustSeeder::class);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('12345678')
        ]);

        $user->attachRole('administrator');
    }
}