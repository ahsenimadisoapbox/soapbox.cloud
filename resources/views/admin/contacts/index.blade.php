@extends('layouts.backend')

@section('content')

<div class="container-fluid">
    <h4 class="mb-3">Contact Leads</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($contacts as $key => $contact)
                            <tr>
                                <td>{{ $contacts->firstItem() + $key }}</td>
                                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->company }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                       class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No contact leads found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $contacts->links() }}
            </div>

        </div>
    </div>
</div>

@endsection