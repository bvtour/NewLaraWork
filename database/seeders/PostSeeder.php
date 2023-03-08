<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $homeRecord =  [
            'author_id' => 1,
            'parent_id' => null,
            'title' => "Home",
            'slug' => "home",
            'post_type' => "home"
        ];
        \App\Models\Admin\Post::firstOrNew($homeRecord);
        
        $aboutUs = [
            'author_id' => 1,
            'parent_id' => null,
            'title' => "About Us",
            'slug' => "about-us",
            'post_type' => "about_us"
        ];
        \App\Models\Admin\Post::firstOrNew($aboutUs);

        $howItWorks = [
            'author_id' => 1,
            'parent_id' => null,
            'title' => "How It Works",
            'slug' => "how-it-works",
            'post_type' => "how_it_works"
        ];
        \App\Models\Admin\Post::firstOrNew($howItWorks);
        
        $servicesPackages = [
            'author_id' => 1,
            'parent_id' => null,
            'title' => "Services and packages",
            'slug' => "services-and-packages",
            'post_type' => "services_and_packages"
        ];
        \App\Models\Admin\Post::firstOrNew($servicesPackages);
        
        $testimonials = [
            'author_id' => 1,
            'parent_id' => null,
            'title' => "Testimonies",
            'slug' => "testimonies",
            'post_type' => "testimonies"
        ];
        \App\Models\Admin\Post::firstOrNew($testimonials);

        $contacts = [
            'author_id' => 1,
            'parent_id' => null,
            'title' => "Contact",
            'slug' => "contact",
            'post_type' => "contact"
        ];
        \App\Models\Admin\Post::firstOrNew($contacts);
    }
}
