<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hashtag;

class hashtagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hashtags = [
            ['title_1', '#1,#2,#4', 'description_1'],
            ['title_2', '#2,#2,#4', 'description_2'],
            ['title_3', '#3,#2,#4', 'description_3'],
            ['title_4', '#4,#2,#4', 'description_4'],
            ['title_5', '#5,#2,#4', 'description_5'],
            ['title_6', '#6,#2,#4', 'description_6'],
            ['title_7', '#7,#2,#4', 'description_7'],
            ['title_8', '#8,#2,#4', 'description_8'],
            ['title_9', '#9,#2,#4', 'description_9'],
            ['title_10', '#0,#2,#4', 'description_0'],
            ['title_5', '#5,#2,#4', 'description_5'],
            ['title_6', '#6,#2,#4', 'description_6'],
            ['title_7', '#7,#2,#4', 'description_7'],
            ['title_8', '#8,#2,#4', 'description_8'],
            ['title_9', '#9,#2,#4', 'description_9'],
            ['title_10', '#0,#2,#4', 'description_0'],
            ['title_10', '#0,#2,#4', 'description_0'],
            ['title_5', '#5,#2,#4', 'description_5'],
            ['title_6', '#6,#2,#4', 'description_6'],
            ['title_7', '#7,#2,#4', 'description_7'],
            ['title_8', '#8,#2,#4', 'description_8'],
            ['title_9', '#9,#2,#4', 'description_9'],
            ['title_10', '#0,#2,#4', 'description_0'],
        ];

        foreach ($hashtags as  list($title, $hash_tag, $description)) {
            Hashtag::create([
                'title' => $title,
                'hashtag' => $hash_tag,
                'description' => $description,
            ]);
        }
    }
}
