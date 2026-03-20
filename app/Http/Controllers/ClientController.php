<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientRepo;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepo = $clientRepo;
    }

    // show all clients
    public function index(Request $request)
    {
        // check if theres a status filter
        if ($request->has('status') && in_array($request->status, ['active', 'inactive'])) {
            $clients = $this->clientRepo->filterByStatus($request->status);
        } else {
            $clients = $this->clientRepo->all();
        }

        return view('clients.index', compact('clients'));
    }

    // show create form
    public function create()
    {
        return view('clients.create');
    }

    // save new client
    public function store(Request $request)
    {
        // validate the input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients,email',
            'status' => 'required|in:active,inactive',
        ]);

        $this->clientRepo->create($validated);

        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }

    // show edit form
    public function edit($id)
    {
        $client = $this->clientRepo->find($id);
        return view('clients.edit', compact('client'));
    }

    // update client
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $this->clientRepo->update($id, $validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    // delete client
    public function destroy($id)
    {
        $this->clientRepo->delete($id);

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }
}
