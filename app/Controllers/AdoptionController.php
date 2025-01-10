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
            return redirect()->to('/sugency/login')->with('error', 'You need to log in first.');
        }
    
        $animalModel = new AnimalModel();

        $animals = $animalModel->findAll();

        return view('iqbal/adoption/adoption', ['animals' => $animals]);
    }
    
    public function showInfo($animalId)
    {
        $animalModel = new AnimalModel();
        $catNeedsModel = new CatNeedsModel();

        $animal = $animalModel->find($animalId);
    
        if (!$animal) {
            return redirect()->to('/sugency/adoption')->with('error', 'Animal not found.');
        }

        $catNeeds = $catNeedsModel->where('breed', $animal['breed'])->first();
    
        return view('iqbal/adoption/adoption_info', ['animal' => $animal, 'catNeeds' => $catNeeds]);
    }

    public function requestAdoption($animalId)
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/sugency/login')->with('error', 'You need to log in to make an adoption request.');
        }

        if ($this->request->getMethod() === 'post') {
            return $this->handleAdoptionRequest($userId, $animalId);
        }

        return $this->showAdoptionRequestForm($animalId);
    }

    private function handleAdoptionRequest($userId, $animalId)
    {
        $adoptionRequestModel = new AdoptionRequestModel();

        $hasPets = $this->request->getPost('has_pets');
        $hasPetsBoolean = $hasPets === 'true' ? 't' : 'f';

        $data = [
            'user_id' => $userId,
            'animal_id' => $animalId,
            'income' => $this->request->getPost('income'),
            'living_type' => $this->request->getPost('living_type'),
            'has_pets' => $hasPetsBoolean,
            'reason' => $this->request->getPost('reason'),
            'status' => 'pending'
        ];

    
        try {
            $adoptionRequestModel->insert($data);
            return redirect()->to('/adoption')->with('success', 'Adoption request submitted');
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return redirect()->to('/adoption')->with('error', 'Database error.');
        }
    }
    
    private function showAdoptionRequestForm($animalId)
    {
        $animalModel = new AnimalModel();
        $animal = $animalModel->find($animalId);
    
        if (!$animal) {
            return redirect()->to('/sugency/adoption')->with('error', 'Animal not found.');
        }
    
        return view('iqbal/adoption/adoption_request_form', ['animal' => $animal]);
    }

    public function getFoodsForBreed($breed)
    {
        $client = \Config\Services::curlrequest();
        $token = $this->getToken();

        if (!$token) {
            return redirect()->to('/login')->with('error', 'Authentication required.');
        }

        $response = $client->get('/thecatalogue/foods/suitable', [
            'query' => ['breed' => $breed],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            return redirect()->to('/adoption')->with('error', 'Failed to fetch suitable foods.');
        }

        $foods = json_decode($response->getBody(), true);

        return view('iqbal/adoption/foods_list', ['foods' => $foods, 'breed' => $breed]);
    }

    public function buyFood()
    {
        $foodId = $this->request->getPost('food_id');

        if (!$foodId) {
            return redirect()->to('/adoption')->with('error', 'Invalid food selection.');
        }

        $client = \Config\Services::curlrequest();
        $token = $this->getToken();

        if (!$token) {
            return redirect()->to('/login')->with('error', 'Authentication required.');
        }

        $response = $client->post('/thecatalogue/foods/checkout', [
            'form_params' => [
                'food_id' => $foodId,
                'promo' => 'true',
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            return redirect()->to('/adoption')->with('error', 'Failed to purchase food.');
        }

        return redirect()->to('/adoption')->with('success', 'Food purchased successfully!');
    }

    private function getToken()
    {
        $session = \Config\Services::session();
        return $session->get('auth_token');
    }
    
    public function showHistory()
    {
        $adoptionRequestModel = new AdoptionRequestModel();
    
        $userId = session()->get('user_id');
        $data['requests'] = $adoptionRequestModel->where('user_id', $userId)->findAll();

        $data['products'] = [
            [
                'food_id' => 6,
                'image' => 'https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/whiskas-3d-1-2kg-fop-adult-tunasalmon-2_1713964404624_1720690073265_1723473561293.png',
                'name' => 'Whiskas Tuna Delight',
                'description' => 'A delicious tuna-flavored cat food',
            ],
            [
                'food_id' => 12,
                'image' => 'https://petshopindonesia.com/wp-content/uploads/2022/12/i100058-friskies-indoor-delights-1-1-kg-makanan-kucing-rumahan-1.jpg',
                'name' => 'Friskies Indoor Delights',
                'description' => 'Specially formulated dry food',
            ],
            [
                'food_id' => 13,
                'image' => 'https://petshopindonesia.com/wp-content/uploads/2022/12/ii030051-royal-canin-hairball-care-400gr-makanan-kucing-dewasa-hairball-1-1.jpg',
                'name' => 'Royal Canin Hairball',
                'description' => 'Helps cats manage hairballs with balanced nutrition',
            ],
        ];
    
        return view('iqbal/adoption/history', $data);
    }
}
