@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">

        <h2>Industries</h2>

        <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
            Add Industry
        </a>

    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($industries as $industry)

            <tr>

                <td>
                    <img src="{{ asset($industry->image) }}" width="80">
                </td>

                <td>{{ $industry->title }}</td>

                <td>{{ $industry->slug }}</td>

                <td>
                    <a href="{{ route('industry-details', $industry->slug) }}" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

                    <a href="{{ route('admin.industries.edit', $industry->id) }}"
                    class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('admin.industries.destroy', $industry->id) }}"
                        method="POST"
                        style="display:inline-block">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection