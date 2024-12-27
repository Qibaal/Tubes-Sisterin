<?php


namespace App\Controllers;

use App\Models\AnimalModel;
use CodeIgniter\Controller;
use \App\Models\AdoptionRequestModel;

class AdoptionController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login')->with('error', 'You need to log in first.');
        }

        $animalModel = new AnimalModel();
        $animals = $animalModel->findAll();

        return view('adoption', ['animals' => $animals]);
    }

    public function requestAdoption($animalId)
    {
        $userId = session()->get('user_id');
    
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in to make an adoption request.');
        }
    
        if ($this->request->getMethod() === 'post') {
            // Process the form submission
            $adoptionRequestModel = new AdoptionRequestModel();
    
            $existingRequest = $adoptionRequestModel->where([
                'user_id' => $userId,
                'animal_id' => $animalId,
            ])->first();
    
            if ($existingRequest) {
                return redirect()->back()->with('error', 'You have already requested adoption for this animal.');
            }
    
            $adoptionRequestModel->insert([
                'user_id' => $userId,
                'animal_id' => $animalId,
                'income' => $this->request->getPost('income'),
                'living_type' => $this->request->getPost('living_type'),
                'has_pets' => $this->request->getPost('has_pets'),
                'reason' => $this->request->getPost('reason'),
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
    
            return redirect()->to('/adoption')->with('success', 'Adoption request submitted successfully.');
        } else {
            // Display the form
            $animalModel = new \App\Models\AnimalModel();
            $animal = $animalModel->find($animalId);
    
            if (!$animal) {
                return redirect()->to('/adoption')->with('error', 'Animal not found.');
            }
    
            return view('adoption_request_form', ['animal' => $animal]);
        }
    }    
}
