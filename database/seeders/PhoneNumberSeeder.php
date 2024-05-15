<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhoneNumber;  // Model Phone
use App\Models\Contact;  //Phone Contact

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Contact::all()->each(function ($contact) {
            $contact->phoneNumbers()->saveMany(PhoneNumber::factory(rand(1, 2))->make());
        });
    }
}
