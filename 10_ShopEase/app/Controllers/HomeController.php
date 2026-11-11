<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'ShopEase - Online Shopping Made Easy',

            'categories' => [
                [
                    'name' => 'Electronics',
                    'icon' => '🎧',
                    'description' => 'Gadgets and technology'
                ],
                [
                    'name' => 'Fashion',
                    'icon' => '👕',
                    'description' => 'Style for everyone'
                ],
                [
                    'name' => 'Accessories',
                    'icon' => '⌚',
                    'description' => 'Complete your look'
                ],
                [
                    'name' => 'Home & Living',
                    'icon' => '🏠',
                    'description' => 'Make yourself at home'
                ]
            ],

            'products' => [
                [
                    'name' => 'Wireless Headphone',
                    'category' => 'Electronics',
                    'price' => 299000,
                    'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600',
                    'label' => 'Best Seller'
                ],
                [
                    'name' => 'Classic Sneakers',
                    'category' => 'Fashion',
                    'price' => 350000,
                    'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600',
                    'label' => 'Popular'
                ],
                [
                    'name' => 'Smart Watch',
                    'category' => 'Electronics',
                    'price' => 450000,
                    'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600',
                    'label' => 'New Arrival'
                ],
                [
                    'name' => 'Minimalist Backpack',
                    'category' => 'Accessories',
                    'price' => 225000,
                    'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600',
                    'label' => 'Trending'
                ]
            ]
        ];

        return view('frontend/home', $data);
    }

    public function about()
    {
        $data['title'] = 'About Us - ShopEase';
        return view('frontend/about', $data);
    }

    public function contact()
    {
        $data['title'] = 'Contact Us - ShopEase';
        return view('frontend/contact', $data);
    }
}




