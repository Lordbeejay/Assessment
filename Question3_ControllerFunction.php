<?php

// Question 3 - storeClientDetails() Controller Function
// Uses a repository to save the client and returns a JSON response


// --- ClientRepository (app/Repositories/ClientRepository.php) ---

class ClientRepository
{
    public function create(array $data)
    {
        return Client::create($data);
    }
}


// --- ClientController (app/Http/Controllers/ClientController.php) ---

class ClientController extends Controller
{
    private $clientRepo;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    public function storeClientDetails(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|max:255',
            'email'  => 'required|email|unique:clients,email',
            'status' => 'required|in:active,inactive',
        ]);

        $client = $this->clientRepo->create($validated);

        return response()->json([
            'status' => 'success',
            'client' => $client,
        ], 201);
    }
}
