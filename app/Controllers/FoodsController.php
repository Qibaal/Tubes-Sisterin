<?php

namespace App\Controllers;

use App\Models\FoodModel;
use CodeIgniter\Controller;
use \App\Models\OrderModel;

class FoodsController extends Controller
{
    public function index()
    {
        $foodModel = new FoodModel();
        $foods = $foodModel->findAll();
        return view('favian/foods/foods', ['foods' => $foods]);
    }

    public function checkout()
    {
        $foodId = $this->request->getPost('food_id');
        $promo = $this->request->getPost('promo') === 'true';
    
        if (!$foodId) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Invalid product selection.');
        }
    
        $foodModel = new FoodModel();
        $food = $foodModel->find($foodId);
    
        if (!$food) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Product not found.');
        }

        $food['original_price'] = $food['price'];

        if ($promo) {
            $food['price'] = round($food['price'] * 0.8, 1);
            $food['promo_applied'] = true;
        } else {
            $food['promo_applied'] = false;
        }

        return view('favian/foods/checkout', ['food' => $food]);
    }
    
    public function confirmCheckout()
    {
        $foodId = $this->request->getPost('food_id');
        $price = $this->request->getPost('price');
    
        if (!$foodId || !$price) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Invalid product selection.');
        }
    
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/thecatalogue/login')->with('error', 'You must be logged in to make a purchase.');
        }
    
        $orderModel = new OrderModel();
        $orderModel->insert([
            'food_id' => $foodId,
            'user_id' => $userId,
            'price' => $price
        ]);
    
        return redirect()->to('/thecatalogue/history')->with('success', 'Purchase completed successfully!');
    }
}
