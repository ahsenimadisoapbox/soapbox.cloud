@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-4">

        <h2>Services</h2>

        <a href="{{ route('admin.services.create') }}"
           class="btn btn-primary">

            Add Service

        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Industry</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            @foreach($services as $service)

            <tr>

                <td>

                    @if($service->image)

                        <img src="{{ asset($service->image) }}"
                             width="80">

                    @endif

                </td>

                <td>{{ $service->title }}</td>

                <td>
                    {{ $service->industry->title ?? 'N/A' }}
                </td>

                <td>{{ $service->slug }}</td>

                <td>

                    <a href="{{ route('admin.services.show', $service->id) }}"
                    class="btn btn-info btn-sm">

                        View

                    </a>

                    <a href="{{ route('admin.services.edit', $service->id) }}"
                    class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('admin.services.destroy', $service->id) }}"
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