<?php


namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\CatNeedsModel;
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
        $animalModel = new AnimalModel();
        $catNeedsModel = new CatNeedsModel();

        $animal = $animalModel->find($animalId);
    
        if (!$animal) {
            return redirect()->to('/adoption')->with('error', 'Animal not found.');
        }

        $catNeeds = $catNeedsModel->where('breed', $animal['breed'])->first();
    
        return view('adoption_info', ['animal' => $animal, 'catNeeds' => $catNeeds]);
    }

    public function requestAdoption($animalId)
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in to make an adoption request.');
        }

        if ($this->request->getMethod() === 'post') {
            return $this->handleAdoptionRequest($userId, $animalId);
        }

        return $this->showAdoptionRequestForm($animalId);
    }

    private function handleAdoptionRequest($userId, $animalId)
    {
        $adoptionRequestModel = new AdoptionRequestModel();
    
        try {
            // Format has_pets as boolean
            $hasPets = $this->request->getPost('has_pets');
            $hasPetsBoolean = in_array($hasPets, ['1', 'true', true]) ? true : false;
    
            $data = [
                'user_id' => (int)$userId,
                'animal_id' => (int)$animalId,
                'income' => (float)$this->request->getPost('income'),
                'living_type' => $this->request->getPost('living_type'),
                'has_pets' => $hasPetsBoolean,
                'reason' => $this->request->getPost('reason'),
                'status' => 'pending'
            ];
    
            if (!$adoptionRequestModel->insert($data)) {
                log_message('error', 'Validation errors: ' . print_r($adoptionRequestModel->errors(), true));
                return redirect()->back()
                    ->with('error', 'Validation failed: ' . implode(', ', $adoptionRequestModel->errors()));
            }
    
            return redirect()->to('/adoption')->with('success', 'Adoption request submitted successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Database error occurred.');
        }
    }
    
    private function showAdoptionRequestForm($animalId)
    {
        $animalModel = new AnimalModel();
        $animal = $animalModel->find($animalId);
    
        if (!$animal) {
            return redirect()->to('/adoption')->with('error', 'Animal not found.');
        }
    
        return view('adoption_request_form', ['animal' => $animal]);
    }
    
    public function showHistory()
    {
        $adoptionRequestModel = new AdoptionRequestModel();

        $userId = session()->get('user_id');
        $data['requests'] = $adoptionRequestModel->where('user_id', $userId)->findAll();

        return view('adoption/history', $data);
    }
}
