@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please fix the following errors:
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mt-3">
 
    {{-- ================= BASIC INFO ================= --}}
    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Module Information</strong>
        </div>
 
        <div class="card-body">
            <div class="row g-3">
 
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $module->name ?? '') }}">
                </div>
 
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $module->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
 
                <div class="col-md-12">
                    <label>Short Description</label>
                    @include('partials.editor', [
                        'name' => 'short_description',
                        'id' => 'short_desc',
                        'value' => old('short_description', $module->short_description ?? ''),
                    ])
                </div>
 
                <div class="col-md-12">
                    <label>Description</label>
                    @include('partials.editor', [
                        'name' => 'description',
                        'id' => 'desc',
                        'value' => old('description', $module->description ?? ''),
                    ])
                </div>
 
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-9">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control mb-2"
                                   placeholder="Image URL">
                        </div>
                        <div class="col-3 text-end">
                            @if(!empty($module->image))
                                <img src="{{ asset($module->image) }}" class="img-thumbnail mt-2" width="70">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-9">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control mb-2"
                                   placeholder="Image URL">
                        </div>
                        <div class="col-3 text-end">
                            @if(!empty($module->banner_image))
                                <img src="{{ asset($module->banner_image) }}" class="img-thumbnail mt-2" width="70">
                            @endif
                        </div>
                    </div>
                </div>
 
                <div class="col-md-5">
                    <label>Icon</label>
                    <input type="text" name="icon" class="form-control"
                           value="{{ old('icon', $module->icon ?? '') }}">
                </div>
 
                <div class="col-md-2">
                    <label>Sort</label>
                    <input type="number" name="sort_order" class="form-control"
                           value="{{ old('sort_order', $module->sort_order ?? 0) }}">
                </div>
 
                <div class="col-md-6">
                    <label>Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', $module->status ?? 1)==1?'selected':'' }}>Active</option>
                        <option value="0" {{ old('status', $module->status ?? 1)==0?'selected':'' }}>Inactive</option>
                    </select>
                </div>
 
                <div class="col-md-6">
                    <label>Status (Live/Coming Soon)</label>
 
                    <select name="is_live" class="form-select">
                        <option value="1" {{ old('is_live', $module->is_live ?? 1) == 1 ? 'selected' : '' }}>
                            ✅ Live
                        </option>
                        <option value="0" {{ old('is_live', $module->is_live ?? 1) == 0 ? 'selected' : '' }}>
                            ⏳ Coming Soon
                        </option>
                    </select>
                </div>
 
                <div class="col-md-12">
                    <label>CTA</label>
                    @include('partials.editor', [
                        'name' => 'cta',
                        'id' => 'cta',
                        'value' => old('cta', $module->cta ?? ''),
                    ])
                </div>
 
            </div>
        </div>
    </div>
 
    {{-- ================= ACCORDION SECTIONS ================= --}}
    <div class="accordion" id="moduleAccordion">
 
        {{-- ===== Challengers ===== --}}
        @include('partials.repeater-card', [
            'id' => 'challenger',
            'title' => 'Challengers',
            'items' => $module->challengers ?? [],
            'fields' => ['name','description']
        ])
 
        {{-- ===== Solutions ===== --}}
        @include('partials.repeater-solution')
 
        {{-- ===== Key Capabilities ===== --}}
        @include('partials.repeater-card', [
            'id' => 'key_capabilitie',
            'title' => 'Key Capabilities',
            'items' => $module->keyCapabilities ?? [],
            'fields' => ['name','description']
        ])
 
        {{-- ===== Uses ===== --}}
        @include('partials.repeater-card', [
            'id' => 'uses',
            'title' => 'Uses',
            'items' => $module->uses ?? [],
            'fields' => ['name','description']
        ])
 
        {{-- ===== Measurable ===== --}}
        @include('partials.repeater-card', [
            'id' => 'measurable',
            'title' => 'Measurable Outcomes',
            'items' => $module->measurables ?? [],
            'fields' => ['name','description']
        ])
 
        {{-- ===== Frameworks ===== --}}
        @include('partials.repeater-framework')
 
    </div>
 
 
    {{-- ================= SEO ================= --}}
    <div class="card shadow border-0 mt-4">
        <div class="card-header bg-dark text-white">
            SEO Settings
        </div>
 
        <div class="card-body">
 
            <input type="text" name="meta_title" class="form-control mb-2"
                   placeholder="Meta Title"
                   value="{{ old('meta_title', $module->meta_title ?? '') }}">
 
            <textarea name="meta_description" class="form-control mb-2"
                      placeholder="Meta Description">{{ old('meta_description', $module->meta_description ?? '') }}</textarea>
 
            <textarea name="meta_keywords" class="form-control"
                      placeholder="Meta Keywords">{{ old('meta_keywords', $module->meta_keywords ?? '') }}</textarea>
 
        </div>
    </div>
 
 
    {{-- ================= ACTIONS ================= --}}
    <div class="text-end mt-4">
        <a href="{{ route('admin.modules.index') }}" class="btn btn-light border">Cancel</a>
        <button class="btn btn-primary px-4">Save Module</button>
    </div>
 
</div>
 
@include('partials.moduleScript')
 