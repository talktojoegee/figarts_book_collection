<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books =
            [
            [
                'title' => 'The Power of Positive Thinking',
                'author' => 'Norman Vincent Peale',
                'description' => 'A practical guide to mastering the problems of everyday living.',
                'published_year' => 1952,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Richest Man in Babylon',
                'author' => 'George S. Clason',
                'description' => 'A timeless classic on managing personal finance and building wealth.',
                'published_year' => 1926,
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Increase Your Financial IQ',
                'author' => 'Robert T. Kiyosaki',
                'description' => 'A book to help you manage your money more effectively and achieve financial freedom.',
                'published_year' => 2008,
                'status' => 'reserved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Never Give Up',
                'author' => 'Joyce Meyer',
                'description' => 'An inspirational book on how to overcome life’s obstacles.',
                'published_year' => 2009,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Power of One More',
                'author' => 'Ed Mylett',
                'description' => 'A motivational book focusing on small actions that lead to great results.',
                'published_year' => 2022,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Psychology of Money',
                'author' => 'Morgan Housel',
                'description' => 'A book on the subtle and complex ways people think about money.',
                'published_year' => 2020,
                'status' => 'borrowed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The New Confessions of an Economic Hitman',
                'author' => 'John Perkins',
                'description' => 'An updated look at economic exploitation and corporate greed.',
                'published_year' => 2016,
                'status' => 'reserved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('books')->insert($books);
    }
}
