@extends('layouts.backend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Popups</h2>

        <a href="{{ route('admin.popups.create') }}"
           class="btn btn-primary">
            Add Popup
        </a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($popups as $popup)

                    <tr>

                        <td>{{ $popup->id }}</td>

                        <td>
                            @if($popup->image)
                                <img src="{{ asset($popup->image) }}"
                                     width="120">
                            @endif
                        </td>

                        <td>{{ $popup->title }}</td>

                        <td>{{ $popup->link }}</td>

                        <td>
                            @if($popup->status)
                                <span class="badge bg-success">
                                    Active
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td>

                            <a href="{{ route('admin.popups.edit', $popup->id) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.popups.destroy', $popup->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete popup?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            No popups found.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection