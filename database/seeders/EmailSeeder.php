<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Email;
use App\Models\Contact;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::all()->each(function ($contact) {
            $contact->emails()->saveMany(Email::factory(rand(1, 3))->make());
        });
    }
}
