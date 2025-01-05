<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\FoodModel;
use CodeIgniter\Controller;

class HistoryCatalogueController extends Controller
{
    public function index()
    {
        $orderModel = new OrderModel();
        $foodModel = new FoodModel();

        // Retrieve orders with food details
        $orders = $orderModel->findAll();

        $data = [];
        foreach ($orders as $order) {
            $food = $foodModel->find($order['food_id']);
            $data[] = [
                'id' => $order['id'],
                'food_name' => $food['name'],
                'price' => $food['price'],
                'created_at' => $order['created_at'],
            ];
        }

        return view('favian/history/history', ['orders' => $data]);
    }
}
