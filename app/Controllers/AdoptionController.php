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
    
    public function showInfo($animalId)
    {
        $animalModel = new \App\Models\AnimalModel();
        $catNeedsModel = new \App\Models\CatNeedsModel();
    
        // Fetch the animal's details
        $animal = $animalModel->find($animalId);
    
        if (!$animal) {
            return redirect()->to('/adoption')->with('error', 'Animal not found.');
        }
    
        // Fetch the cat's specific needs based on the breed
        $catNeeds = $catNeedsModel->where('breed', $animal['breed'])->first();
    
        // Pass the data to the view
        return view('adoption_info', ['animal' => $animal, 'catNeeds' => $catNeeds]);
    }
    

    public function requestAdoption($animalId)
    {
        $userId = session()->get('user_id');
    
        // Ensure the user is logged in
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in to make an adoption request.');
        }
    
        // Check if it's a POST request (form submission)
        if ($this->request->getMethod() === 'post') {
            return $this->handleAdoptionRequest($userId, $animalId);
        }
    
        // Otherwise, display the adoption request form
        return $this->showAdoptionRequestForm($animalId);
    }
    
    /**
     * Handles the adoption request submission.
     */
    private function handleAdoptionRequest($userId, $animalId)
    {
        $adoptionRequestModel = new \App\Models\AdoptionRequestModel();
    
        // Check if an adoption request already exists for this user and animal
        $existingRequest = $adoptionRequestModel->where([
            'user_id' => $userId,
            'animal_id' => $animalId,
        ])->first();
    
        if ($existingRequest) {
            return redirect()->back()->with('error', 'You have already requested adoption for this animal.');
        }
    
        // Insert a new adoption request
        $data = [
            'user_id' => $userId,
            'animal_id' => $animalId,
            'income' => $this->request->getPost('income'),
            'living_type' => $this->request->getPost('living_type'),
            'has_pets' => $this->request->getPost('has_pets'),
            'reason' => $this->request->getPost('reason'),
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
        if (!$adoptionRequestModel->insert($data)) {
            return redirect()->to('/adoption')->with('error', 'Failed to submit the adoption request.');
        }
    
        return redirect()->to('/adoption')->with('success', 'Adoption request submitted successfully.');
    }
    
    /**
     * Displays the adoption request form for the specified animal.
     */
    private function showAdoptionRequestForm($animalId)
    {
        $animalModel = new \App\Models\AnimalModel();
        $animal = $animalModel->find($animalId);
    
        if (!$animal) {
            return redirect()->to('/adoption')->with('error', 'Animal not found.');
        }
    
        return view('adoption_request_form', ['animal' => $animal]);
    }
      
}
