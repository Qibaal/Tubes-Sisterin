<?php

namespace App\Controllers;

use App\Models\AnimalModel;

class AdminController extends BaseController
{
    public function index()
    {
        if (!session()->has('is_admin') || !session()->get('is_admin')) {
            return redirect()->to('/login')->with('error', 'You must be an admin to access this page.');
        }

        $animalModel = new AnimalModel();
        $animals = $animalModel->findAll();

        return view('admin/animals/index', ['animals' => $animals]);
    }

    public function create()
    {
        return view('admin/animals/create');
    }

    public function store()
    {
        $animalModel = new AnimalModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'breed' => $this->request->getPost('type'),
            'age' => $this->request->getPost('age'),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $animalModel->insert($data);

        return redirect()->to('/admin/animals')->with('success', 'Animal added successfully.');
    }

    public function edit($id)
    {
        $animalModel = new AnimalModel();
        $animal = $animalModel->find($id);

        if (!$animal) {
            return redirect()->to('/admin/animals')->with('error', 'Animal not found.');
        }

        return view('admin/animals/edit', ['animal' => $animal]);
    }

    public function update($id)
    {
        $animalModel = new AnimalModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'breed' => $this->request->getPost('type'),
            'age' => $this->request->getPost('age'),
            'description' => $this->request->getPost('description'),
        ];

        $animalModel->update($id, $data);

        return redirect()->to('/admin/animals')->with('success', 'Animal updated successfully.');
    }

    public function delete($id)
    {
        $animalModel = new AnimalModel();
        $animalModel->delete($id);

        return redirect()->to('/admin/animals')->with('success', 'Animal deleted successfully.');
    }

    public function listRequests()
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('/login')->with('error', 'Admin access required.');
        }

        $adoptionRequestModel = new \App\Models\AdoptionRequestModel();
        $requests = $adoptionRequestModel
            ->select('adoption_requests.*, users.full_name, cats.name as animal_name')
            ->join('users', 'users.id = adoption_requests.user_id')
            ->join('cats', 'cats.id = adoption_requests.animal_id')
            ->findAll();

        return view('admin/requests', ['requests' => $requests]);
    }

    public function updateRequestStatus($requestId, $status)
    {
        if (!session()->get('is_admin')) {
            return redirect()->to('/login')->with('error', 'Admin access required.');
        }

        $adoptionRequestModel = new \App\Models\AdoptionRequestModel();

        $adoptionRequestModel->update($requestId, [
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/requests')->with('success', 'Request status updated successfully.');
    }

}
