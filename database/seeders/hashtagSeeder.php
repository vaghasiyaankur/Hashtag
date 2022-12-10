<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hashtag;
use Illuminate\Support\Facades\File;

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
            ['Jacket', 'Nike,Zara,Reebok', 'gucci-nylon-fabric-smart-unisex-backpack-1', 'img_1.jpg'],
            ['Hoodies', 'Raymond,games,CalvinKlein', 'infinite-blog-magazine-script-2', null],
            ['Jeans', 'Reebok,Zara,TommyHilfiger', 'recreational activity of hiking while carrying clothing, food, and camping equipment in a pack on the back.', null],
            ['Slim Fit Jacket', 'TommyHilfiger,Zara', ' Originally, in the early 20th century, backpacking was practiced in the wilderness as a means of getting to areas inaccessible by car or by day hike.', null],
            ['shirt', 'CalvinKlein,Raymond', ' It demands physical conditioning and practice, knowledge of camping and survival techniques,', null],
            ['shoes', 'TommyHilfiger,Zara', 'and selection of equipment of a minimum weight consistent with safety and comfort.', null],
            ['t-shirt', 'Raymond,Reebok', 'description_7', null],
            ['formal shirt', 'CalvinKlein,Raymond', 'is a multi-purpose blog-magazine script. It has clean, responsive and user-friendly design. You can manage your posts, custom pages, categories.', null],
            ['loafer shoes', 'TommyHilfiger,Reebok', 'user comments, advanced settings and contact messages with its powerful Admin panel. Also it has a useful ad management system.', null],
            ['Sweatshirt Hoodie', 'Reebok,TommyHilfiger', 'ou can manage your ad spaces with this system. It is secured, seo optimized, fast and easy to use.', null],
        ];

        File::copy(public_path('img/dummyimg.jpg'), public_path('storage/Hashtag/img_1.jpg'));

        foreach ($hashtags as  list($title, $hash_tag, $description, $image)) {
            Hashtag::create([
                'title' => $title,
                'hashtag' => $hash_tag,
                'description' => $description,
                'photos' => $image
            ]);
        }
    }
}
