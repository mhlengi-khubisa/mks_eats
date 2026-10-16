<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@townshipmarket.test'],
            [
                'name' => 'Mks Eats Admin',
                'password' => Hash::make('Password123!'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $customer = User::firstOrCreate(
            ['email' => 'customer@townshipmarket.test'],
            [
                'name' => 'Demo Customer',
                'password' => Hash::make('Password123!'),
                'role' => 'customer',
                'is_active' => true,
            ]
        );

        $firstVendorUser = User::firstOrCreate(
            ['email' => 'vendor1@townshipmarket.test'],
            [
                'name' => 'Village Goods',
                'password' => Hash::make('Password123!'),
                'role' => 'vendor',
                'is_active' => true,
            ]
        );

        $secondVendorUser = User::firstOrCreate(
            ['email' => 'vendor2@townshipmarket.test'],
            [
                'name' => 'Urban Harvest',
                'password' => Hash::make('Password123!'),
                'role' => 'vendor',
                'is_active' => true,
            ]
        );

        $categories = [
            ['name' => 'Home & Living', 'slug' => 'home-living'],
            ['name' => 'Food & Pantry', 'slug' => 'food-pantry'],
            ['name' => 'Fashion', 'slug' => 'fashion'],
            ['name' => 'Local Street Food', 'slug' => 'local-street-food'],
            ['name' => 'Drinks & Treats', 'slug' => 'drinks-and-treats'],
            ['name' => 'Fresh Produce', 'slug' => 'fresh-produce'],
        ];

        $categoryMap = [];
        foreach ($categories as $category) {
            $categoryMap[$category['slug']] = Category::firstOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name'], 'description' => $category['name'], 'is_active' => true]
            );
        }

        $vendorOne = Vendor::firstOrCreate(
            ['slug' => 'village-goods'],
            [
                'user_id' => $firstVendorUser->id,
                'store_name' => 'Village Goods',
                'description' => 'Handcrafted essentials from the heart of the township.',
                'location' => 'Soweto',
                'province' => 'Gauteng',
                'phone' => '0712345678',
                'is_approved' => true,
                'approved_at' => now(),
            ]
        );

        $vendorTwo = Vendor::firstOrCreate(
            ['slug' => 'urban-harvest'],
            [
                'user_id' => $secondVendorUser->id,
                'store_name' => 'Urban Harvest',
                'description' => 'Fresh pantry favourites and organic produce.',
                'location' => 'Cape Town',
                'province' => 'Western Cape',
                'phone' => '0812345678',
                'is_approved' => true,
                'approved_at' => now(),
            ]
        );

        $products = [
            [
                'vendor_id' => $vendorOne->id,
                'category_id' => $categoryMap['home-living']->id,
                'name' => 'Woven Storage Basket',
                'slug' => 'woven-storage-basket',
                'description' => 'A handwoven basket for home organisation and décor.',
                'sku' => 'TG-WOV-001',
                'price' => 299.00,
                'compare_at_price' => 399.00,
                'is_featured' => true,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorTwo->id,
                'category_id' => $categoryMap['food-pantry']->id,
                'name' => 'Organic Breakfast Pack',
                'slug' => 'organic-breakfast-pack',
                'description' => 'A curated pantry pack of staples and organic toppings.',
                'sku' => 'TG-ORG-002',
                'price' => 189.00,
                'compare_at_price' => 230.00,
                'is_featured' => true,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorOne->id,
                'category_id' => $categoryMap['fashion']->id,
                'name' => 'Handmade Leather Tote',
                'slug' => 'handmade-leather-tote',
                'description' => 'A premium tote with durable, handmade detailing.',
                'sku' => 'TG-LEA-003',
                'price' => 520.00,
                'compare_at_price' => 640.00,
                'is_featured' => false,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorOne->id,
                'category_id' => $categoryMap['local-street-food']->id,
                'name' => 'Soweto Kota',
                'slug' => 'soweto-kota',
                'description' => 'A proper township kota loaded with golden chips, atchar, cheese and a juicy grilled patty.',
                'sku' => 'ME-KOT-004',
                'price' => 85.00,
                'is_featured' => true,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorTwo->id,
                'category_id' => $categoryMap['local-street-food']->id,
                'name' => 'Cape Malay Bunny Chow',
                'slug' => 'cape-malay-bunny-chow',
                'description' => 'Warm, fragrant Cape Malay curry served in a fresh quarter loaf.',
                'sku' => 'ME-BUN-005',
                'price' => 110.00,
                'is_featured' => true,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorOne->id,
                'category_id' => $categoryMap['local-street-food']->id,
                'name' => 'Grilled Chicken & Pap',
                'slug' => 'grilled-chicken-and-pap',
                'description' => 'Flame-grilled chicken with soft pap and a generous spoon of homemade chakalaka.',
                'sku' => 'ME-GRI-006',
                'price' => 125.00,
                'is_featured' => true,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorTwo->id,
                'category_id' => $categoryMap['local-street-food']->id,
                'name' => 'Vetkoek with Curried Mince',
                'slug' => 'vetkoek-with-curried-mince',
                'description' => 'A fluffy, golden vetkoek filled with savoury slow-cooked curried mince.',
                'sku' => 'ME-VET-007',
                'price' => 55.00,
                'is_featured' => false,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorOne->id,
                'category_id' => $categoryMap['local-street-food']->id,
                'name' => 'Boerewors Roll',
                'slug' => 'boerewors-roll',
                'description' => 'A juicy flame-grilled boerewors in a soft roll with tangy tomato relish.',
                'sku' => 'ME-BOE-008',
                'price' => 65.00,
                'is_featured' => false,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorTwo->id,
                'category_id' => $categoryMap['drinks-and-treats']->id,
                'name' => 'Mini Koeksister Box',
                'slug' => 'mini-koeksister-box',
                'description' => 'Six golden, braided koeksisters dipped in fragrant syrup and rolled in coconut.',
                'sku' => 'ME-KOE-009',
                'price' => 72.00,
                'is_featured' => false,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorOne->id,
                'category_id' => $categoryMap['drinks-and-treats']->id,
                'name' => 'Homemade Ginger Beer',
                'slug' => 'homemade-ginger-beer',
                'description' => 'A refreshing, lightly sparkling homemade ginger beer with a bright citrus kick.',
                'sku' => 'ME-GIN-010',
                'price' => 38.00,
                'is_featured' => false,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
            [
                'vendor_id' => $vendorTwo->id,
                'category_id' => $categoryMap['fresh-produce']->id,
                'name' => 'Neighbourhood Veggie Box',
                'slug' => 'neighbourhood-veggie-box',
                'description' => 'A weekly mix of seasonal, locally grown vegetables, ready for the family table.',
                'sku' => 'ME-VEG-011',
                'price' => 145.00,
                'is_featured' => true,
                'is_active' => true,
                'is_approved' => true,
                'approved_at' => now(),
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::firstOrCreate(
                ['slug' => $productData['slug']],
                $productData
            );

            Inventory::updateOrCreate(
                ['product_id' => $product->id],
                ['quantity' => 20, 'reserved_quantity' => 0, 'low_stock_threshold' => 5]
            );

            $image = match ($product->slug) {
                'woven-storage-basket' => [
                    'path' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'Freshly baked bread from a local maker',
                ],
                'organic-breakfast-pack' => [
                    'path' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'A colourful spread of fresh breakfast ingredients',
                ],
                'handmade-leather-tote' => [
                    'path' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'Fresh produce at a local market',
                ],
                'soweto-kota' => [
                    'path' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'A loaded burger inspired by a classic township kota',
                ],
                'cape-malay-bunny-chow' => [
                    'path' => 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'A warm bowl of richly spiced curry',
                ],
                'grilled-chicken-and-pap' => [
                    'path' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'Freshly grilled chicken from the braai',
                ],
                'vetkoek-with-curried-mince' => [
                    'path' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'Golden freshly made savoury pastries',
                ],
                'boerewors-roll' => [
                    'path' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'A freshly grilled sausage roll ready to share',
                ],
                'mini-koeksister-box' => [
                    'path' => 'https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'Sweet pastries ready for a treat',
                ],
                'homemade-ginger-beer' => [
                    'path' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'A refreshing cold drink with citrus',
                ],
                'neighbourhood-veggie-box' => [
                    'path' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1000&q=85',
                    'alt_text' => 'A colourful selection of fresh local vegetables',
                ],
                default => null,
            };

            if ($image) {
                ProductImage::updateOrCreate(
                    ['product_id' => $product->id, 'sort_order' => 0],
                    [...$image, 'is_primary' => true]
                );
            }
        }

        Address::firstOrCreate(
            ['user_id' => $customer->id, 'label' => 'Home'],
            [
                'recipient_name' => 'Demo Customer',
                'phone' => '0821234567',
                'line1' => '14 Main Road',
                'line2' => 'Block A',
                'suburb' => 'Soweto',
                'city' => 'Johannesburg',
                'province' => 'Gauteng',
                'postal_code' => '2001',
                'is_default' => true,
            ]
        );
    }
}
