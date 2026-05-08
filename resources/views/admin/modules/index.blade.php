@extends('layouts.backend')

@section('content')
<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Modules</h4>
    <a href="{{ route('admin.modules.create') }}" class="btn btn-primary mb-3">Add Module</a>
</div>
<div class="row">
    @foreach($modules as $module)
        <div class="col-md-6 mb-3">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6>{{ $module->name }}</h6>
                            <span class="badge bg-dark text-white">{{ $module->category->name ?? 'No Category' }}</span>
                            <span class="badge {{ $module->is_live ? 'bg-success' : 'bg-warning' }} text-white">
                                {{ $module->is_live ? 'Live' : 'Coming Soon' }}
                            </span>
                            <span class="badge {{ $module->status == '1' ? 'bg-primary' : 'bg-secondary' }} text-white">
                                @if($module->status == '1')
                                    Active
                                @else
                                    Inactive
                                @endif
                            </span>
                        </div>
            
                        <div class="btn-group">
                            <a href="{{ route('modules.show', $module->slug) }}" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.modules.edit', $module->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                
                            <form action="{{ route('admin.modules.destroy', $module->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
            
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endforeach

</div>

    {{ $modules->links() }}
@endsection