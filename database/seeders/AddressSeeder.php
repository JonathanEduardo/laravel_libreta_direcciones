<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\Contact;


class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::all()->each(function ($contact) {
            $contact->addresses()->saveMany(Address::factory(rand(1, 2))->make());
        });
    }
}
