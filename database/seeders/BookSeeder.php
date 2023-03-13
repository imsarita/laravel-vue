<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $response = Http::get('https://fakerapi.it/api/v1/books?quantity=100');
            $data[$i] = json_decode($response->body())->data;
        }

        for ($i = 1; $i <= 10; $i++) {
            foreach ($data[$i] as $key => $value) {
                Book::create([
                    'title' => $value->title,
                    'author' => $value->author,
                    'genre' => $value->genre,
                    'description' => $value->description,
                    'isbn' => $value->isbn,
                    'image' => $value->image,
                    'published' => $value->published,
                    'publisher' => $value->publisher
                ]);
            }
        }
    }
}
