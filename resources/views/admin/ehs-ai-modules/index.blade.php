@extends('layouts.backend')

@section('title', 'EHS AI Modules')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-0">
                EHS AI Modules
            </h1>

            <small class="text-muted">
                Manage AI Assist Landing Pages
            </small>
        </div>

        <a href="{{ route('ehs-ai-modules.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus me-1"></i>
            Add AI Module

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="80">
                                ID
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Slug
                            </th>

                            <th width="120">
                                Status
                            </th>

                            <th width="120">
                                Sort Order
                            </th>

                            <th width="200" class="text-end">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($modules as $module)

                            <tr>

                                <td>
                                    {{ $module->id }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $module->name }}
                                    </strong>

                                </td>

                                <td>

                                    <code>
                                        {{ $module->slug }}
                                    </code>

                                </td>

                                <td>

                                    @if($module->status)

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

                                    {{ $module->sort_order }}

                                </td>

                                <td class="text-end">
                                    <a href="{{ route('ehs-ai-module.show', $module->slug) }}" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

                                    <a href="{{ route('ehs-ai-modules.edit', $module) }}"
                                       class="btn btn-sm btn-warning">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('ehs-ai-modules.destroy', $module) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this AI Module?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    No AI Modules Found

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>



    </div>

</div>

@endsection