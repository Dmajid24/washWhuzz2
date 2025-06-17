<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Interior Vacuum',
                'description' => 'Breathe fresh air inside your car! We use high-powered vacuums to thoroughly clean your car interior, including carpets, seats, and hard-to-reach spaces.',
                'price' => 75000,
                'image' => 'Interior Vacuum.png',
                'category' => 'cleaning',
            ],
            [
                'name' => 'Exterior Wash',
                'description' => 'Make your car shine like new! Our exterior wash gently removes dirt, grime, and light stains, leaving your vehicle spotless and gleaming.',
                'price' => 40000,
                'image' => 'Exterior Wash.png',
                'category' => 'cleaning',
            ],
            [
                'name' => 'Window Cleaning',
                'description' => 'Clear views for a safer drive! Our window cleaning service ensures your windows are free from streaks, smudges, and dirt, giving you crystal-clear visibility. Whether its the inside or outside, we got your windows shining like new.',
                'price' => 50000,
                'image' => 'Window Cleaning.png',
                'category' => 'cleaning',
            ],
            [
                'name' => 'Tire Cleaning',
                'description' => 'Get your wheels looking fresh! Clean tires not only improve your vehicle look but also help maintain tire quality. We remove road grime, dirt, and build-up, leaving your tires looking crisp and ready to roll.',
                'price' => 50000,
                'image' => 'Tire Cleaning.png',
                'category' => 'cleaning',
            ],
            [
                'name' => 'Polishing',
                'description' => 'Bring back the brilliance of your car paint! Our polishing service buffs out light scratches, swirl marks, and imperfections, leaving your car body with a smooth, glossy finish. Its the perfect way to restore your vehicle shine and protect its surface from daily wear.',
                'price' => 300000,
                'image' => 'Polishing.png',
                'category' => 'detailing',
            ],
            [
                'name' => 'Ceramic Coating',
                'description' => 'Protect your car surface like never before! Ceramic coating adds a durable, hydrophobic layer that repels dirt, water, and contaminants, making it easier to clean your car. With long-lasting protection against scratches and UV damage, your car will stay cleaner and shinier for months!',
                'price' => 1000000,
                'image' => 'Ceramic Coating.png',
                'category' => 'detailing',
            ],
            [
                'name' => 'Engine Bay Cleaning',
                'description' => 'Keep your engine running smoothly and looking clean! Our engine bay cleaning service removes oil, dirt, and grime from under the hood, helping to prevent build-ups that could affect your engine performance. A clean engine also looks great during regular maintenance or resale.',
                'price' => 300000,
                'image' => 'Engine Bay Cleaning.png',
                'category' => 'detailing',
            ],
            [
                'name' => 'Headlight Restoration',
                'description' => 'Drive safer with clear headlights! Over time, headlights can become foggy or yellowed. Our restoration service brings back the clarity, improving visibility and the overall look of your vehicle.',
                'price' => 250000,
                'image' => 'Headlight Restoration.png',
                'category' => 'detailing',
            ],
            [
                'name' => 'Interior Carpet Vacuum',
                'description' => 'Say goodbye to dust and dirt in your car! We deep-clean your car carpets to remove all dirt, crumbs, and debris, making your interior feel fresh and comfortable. Whether it a quick clean or a deep vacuum, your car carpet will look brand new.',
                'price' => 80000,
                'image' => 'Interior Carpet Vacuum.png',
                'category' => 'vacuum',
            ],
            [
                'name' => 'Seat Vacuuming',
                'description' => 'A clean seat equals a more comfortable ride! Vacuuming your seats gets rid of dust, dirt, and crumbs that have accumulated over time, ensuring a cleaner, more inviting seat every time you get in. Keep your upholstery fresh and tidy with this simple yet effective service.',
                'price' => 60000,
                'image' => 'Seat Vacuuming.png',
                'category' => 'vacuum',
            ],
            [
                'name' => 'Trunk Vacuuming',
                'description' => 'Dont forget the trunk! We will clean the trunk space, removing dust, dirt, and any debris left from your travels. A clean trunk makes for a more pleasant experience and keeps your storage area ready for use.',
                'price' => 50000,
                'image' => 'Trunk Vacuuming.png',
                'category' => 'vacuum',
            ],            
            [
                'name' => 'Floor Mats Cleaning',
                'description' => 'Keep your mats looking new! Floor mats can get dirty quickly, but with our cleaning service, we will remove dirt and stains from your mats, making them look and feel fresh. This small detail makes a big difference in the overall cleanliness of your car.',
                'price' => 60000,
                'image' => 'Floor Mats Cleaning.png',
                'category' => 'vacuum',
            ],            
            [
                'name' => 'Exterior Waxing',
                'description' => 'A perfect shine, every time! Our exterior waxing service gives your car that glossy, showroom shine while providing a layer of protection from the elements. It also helps to protect your paint from scratches, dirt, and UV damage.',
                'price' => 300000,
                'image' => 'Exterior Waxing.png',
                'category' => 'wax',
            ],            
            [
                'name' => 'Paint Protection Wax',
                'description' => 'Keep your car paint looking pristine! This wax gives an extra layer of protection against road contaminants, UV rays, and light scratches. It ensures your car paint remains vibrant and well-protected for a longer-lasting finish.',
                'price' => 500000,
                'image' => 'Paint Protection Wax.png',
                'category' => 'wax',
            ],            
            [
                'name' => 'Gel Coat Waxing',
                'description' => 'Special care for your gel-coated vehicle! For vehicles with gel-coated finishes, this waxing service helps maintain the gloss and protects against environmental damage. It ideal for cars and boats with gel coat finishes.',
                'price' => 600000,
                'image' => 'Gel Coat Waxing.png',
                'category' => 'wax',
            ],            
            [
                'name' => 'Tire Shine Wax',
                'description' => 'Make your tires pop! Our tire shine wax gives your tires a sleek, shiny look, making them appear newer and more polished. It also helps to protect the rubber from cracks and wear due to exposure to the sun and elements.',
                'price' => 100000,
                'image' => 'Tire Shine Wax.png',
                'category' => 'wax',
            ],
            [
                'name' => 'Ceramic Coating',
                'description' => 'Long-lasting protection with a sleek finish! Ceramic coating adds a high-quality, hydrophobic layer to your car that repels dirt, water, and contaminants. This layer enhances your car’s appearance and offers unrivaled protection against environmental damage.',
                'price' => 4000000,
                'image' => 'Ceramic Coating.png',
                'category' => 'coating',
            ],
            [
                'name' => 'Paint Protection Film (PPF)',
                'description' => 'Invisible protection for your car paint! PPF is a clear, protective film that shields your vehicle from scratches, chips, and other paint damage. It perfect for high-impact areas like the hood, bumpers, and side mirrors.',
                'price' => 6000000,
                'image' => 'Paint Protection Film (PPF).png',
                'category' => 'coating',
            ],
            [
                'name' => 'Glass Coating',
                'description' => 'Keep your windows crystal clear! This coating adds a hydrophobic layer to your windows, helping rainwater to bead off and providing better visibility. It also protects against dirt and smudges, keeping your car glass cleaner for longer.',
                'price' => 1000000,
                'image' => 'Glass Coating.png',
                'category' => 'coating',
            ],
            [
                'name' => 'Wheel Coating',
                'description' => 'Protect your wheels from brake dust and dirt! A protective layer for your wheels that prevents brake dust and road grime from sticking, keeping your wheels looking shiny and clean. This coating also helps protect against the elements, extending the life of your wheels.',
                'price' => 500000,
                'image' => 'Wheel Coating.png',
                'category' => 'coating',
            ],
            
            
        ];

        foreach ($services as $index => $service) {
            $id = 'PD' . str_pad($index + 1, 3, '0', STR_PAD_LEFT); // CU001, CU002, ...
            Product::create(array_merge($service, ['idProduct' => $id]));
        }

    }
}
