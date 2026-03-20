@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Clients</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">+ Add New Client</a>
</div>

<!-- filter by status -->
<div class="mb-3">
    <form method="GET" action="{{ route('clients.index') }}" class="d-flex gap-2">
        <select name="status" class="form-select" style="width: 200px;">
            <option value="">All Statuses</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button type="submit" class="btn btn-outline-secondary">Filter</button>
    </form>
</div>

@if($clients->count() > 0)
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>
                @if($client->status == 'active')
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </td>
            <td>{{ $client->created_at->format('M d, Y') }}</td>
            <td>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No clients found. Try adding one!</p>
@endif
@endsection
