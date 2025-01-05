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

        // Fetch all food products from the database
        $foods = $foodModel->findAll();

        // Pass the data to the view
        return view('favian/foods/foods', ['foods' => $foods]);
    }

    public function checkout()
    {
        $foodId = $this->request->getPost('food_id');

        if (!$foodId) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Invalid product selection.');
        }

        $foodModel = new FoodModel();
        $food = $foodModel->find($foodId);

        if (!$food) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Product not found.');
        }

        // Pass the selected product to the checkout view
        return view('favian/foods/checkout', ['food' => $food]);
    }

    public function confirmCheckout()
    {
        $foodId = $this->request->getPost('food_id');
    
        if (!$foodId) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Invalid product selection.');
        }
    
        $foodModel = new FoodModel();
        $food = $foodModel->find($foodId);
    
        if (!$food) {
            return redirect()->to('/thecatalogue/foods')->with('error', 'Product not found.');
        }
    
        // Get the logged-in user's ID from the session
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/thecatalogue/login')->with('error', 'You must be logged in to make a purchase.');
        }

        $orderModel = new OrderModel();

        $orderModel->insert([
            'food_id' => (int)$foodId,
            'user_id' => (int)$userId 
        ]);
    
        return redirect()->to('/thecatalogue/foods')->with('success', 'Purchase completed for ');
    }  

}
