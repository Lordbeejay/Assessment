<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    // get all clients
    public function all()
    {
        return Client::all();
    }

    // find client by id
    public function find($id)
    {
        return Client::findOrFail($id);
    }

    // create new client
    public function create(array $data)
    {
        return Client::create($data);
    }

    // update existing client
    public function update($id, array $data)
    {
        $client = Client::findOrFail($id);
        $client->update($data);
        return $client;
    }

    // delete client
    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }

    // filter by status (for the bonus)
    public function filterByStatus($status)
    {
        return Client::where('status', $status)->get();
    }
}
