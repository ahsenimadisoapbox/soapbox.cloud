@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4>Lead Details</h4>

        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
            Back
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th width="200">First Name</th>
                    <td>{{ $contact->first_name }}</td>
                </tr>

                <tr>
                    <th>Last Name</th>
                    <td>{{ $contact->last_name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $contact->phone }}</td>
                </tr>

                <tr>
                    <th>Company</th>
                    <td>{{ $contact->company }}</td>
                </tr>

                <tr>
                    <th>Country</th>
                    <td>{{ $contact->country }}</td>
                </tr>

                <tr>
                    <th>Hear About</th>
                    <td>{{ $contact->hear_about }}</td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td>{{ $contact->message }}</td>
                </tr>

                <tr>
                    <th>Submitted At</th>
                    <td>{{ $contact->created_at->format('d M Y h:i A') }}</td>
                </tr>
            </table>

        </div>
    </div>

</div>

@endsection