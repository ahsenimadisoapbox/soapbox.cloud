{{-- resources/views/admin/industries/form.blade.php --}}

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

```
{{-- ================= INDUSTRY INFORMATION ================= --}}
<div class="card shadow border-0 mb-4">

    <div class="card-header bg-dark text-white">
        <strong>Industry Information</strong>
    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-6">
                <label>Industry Name</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $industry->title ?? '') }}">
            </div>

            <div class="col-md-6">
                <label>Headline</label>
                <input type="text"
                       name="headline"
                       class="form-control"
                       value="{{ old('headline', $industry->headline ?? '') }}">
            </div>

            <div class="col-md-5">
                <div class="row">

                    <div class="col-9">

                        <label>Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <div class="col-3">

                        @if(!empty($industry->image))
                            <img src="{{ asset($industry->image) }}"
                                 class="img-thumbnail mt-2"
                                 width="70">
                        @endif

                    </div>

                </div>
            </div>

            <div class="col-md-5">

                <div class="row">

                    <div class="col-9">

                        <label>Banner Image</label>

                        <input type="file"
                               name="banner_image"
                               class="form-control">

                    </div>

                    <div class="col-3">

                        @if(!empty($industry->banner_image))
                            <img src="{{ asset($industry->banner_image) }}"
                                 class="img-thumbnail mt-2"
                                 width="70">
                        @endif

                    </div>

                </div>

            </div>

            <div class="col-md-2">

                <label>Icon</label>

                <input type="text"
                       name="icon"
                       class="form-control"
                       placeholder="bi bi-buildings"
                       value="{{ old('icon', $industry->icon ?? '') }}">

            </div>

        </div>

    </div>

</div>


{{-- ================= INDUSTRY CONTENT ================= --}}
<div class="card shadow border-0 mb-4">

    <div class="card-header bg-dark text-white">
        <strong>Industry Content</strong>
    </div>

    <div class="card-body">

        <div class="mb-4">

            <label>Description</label>

            @include('partials.editor',[
                'name' => 'description',
                'id' => 'industry_description',
                'value' => old('description', $industry->description ?? '')
            ])

        </div>

        <div class="mb-4">

            <label>The Reality of Industry Operations</label>

            @include('partials.editor',[
                'name' => 'operations_reality',
                'id' => 'operations_reality',
                'value' => old('operations_reality', $industry->operations_reality ?? '')
            ])

        </div>

        <div class="mb-4">

            <label>Did You Know</label>

            @include('partials.editor',[
                'name' => 'did_you_know',
                'id' => 'did_you_know',
                'value' => old('did_you_know', $industry->did_you_know ?? '')
            ])

        </div>

        <div class="mb-4">

            <label>Most Industry EHS Programmes Didn't Start with a Platform</label>

            @include('partials.editor',[
                'name' => 'legacy_system_intro',
                'id' => 'legacy_system_intro',
                'value' => old('legacy_system_intro', $industry->legacy_system_intro ?? '')
            ])

        </div>

        <div class="mb-4">

            <label>Key Takeaways</label>

            @include('partials.editor',[
                'name' => 'key_takeaways',
                'id' => 'key_takeaways',
                'value' => old('key_takeaways', $industry->key_takeaways ?? '')
            ])

        </div>

        <div class="mb-4">

            <label>Safety Programmes Have In Common</label>

            @include('partials.editor',[
                'name' => 'common_programmes',
                'id' => 'common_programmes',
                'value' => old('common_programmes', $industry->common_programmes ?? '')
            ])

        </div>

    </div>

</div>


{{-- ================= ACCORDION ================= --}}
<div class="accordion" id="industryAccordion">

    {{-- Operations --}}
    @include('partials.repeater-card',[
        'id' => 'operation',
        'title' => 'Operations We Support',
        'items' => $industry->operations ?? [],
        'fields' => ['name','description']
    ])

    {{-- Regulations --}}
    @include('partials.repeater-card',[
        'id' => 'regulation',
        'title' => 'Regulatory Alignment',
        'items' => $industry->regulations ?? [],
        'fields' => ['name','description']
    ])

    {{-- Scaling Silo Trap --}}
    @include('partials.repeater-silo')

</div>


{{-- ================= MODULES ================= --}}
<div class="card shadow border-0 mt-4">

    <div class="card-header bg-dark text-white">
        Recommended Modules
    </div>

    <div class="card-body">

        <div class="row">

            @foreach($modules as $module)

                <div class="col-md-4 mb-2">

                    <div class="form-check">

                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="module_ids[]"
                            value="{{ $module->id }}"
                            {{ in_array($module->id, old('module_ids', $industry->module_ids ?? [])) ? 'checked' : '' }}>

                        <label class="form-check-label">
                            {{ $module->name }}
                        </label>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

{{-- ================= CTA SECTION ================= --}}

<div class="card shadow border-0 mt-4">

    <div class="card-header bg-dark text-white">
        CTA Section
    </div>

    <div class="card-body">

        <div class="mb-3">

            <label>CTA Title</label>

            <input
                type="text"
                name="cta_title"
                class="form-control"
                value="{{ old('cta_title', $industry->cta_title ?? '') }}">

        </div>

        <div class="mb-3">

            <label>CTA Description</label>

            @include('partials.editor',[
                'name' => 'cta_description',
                'id' => 'cta_description',
                'value' => old('cta_description', $industry->cta_description ?? '')
            ])

        </div>

    </div>

</div>


{{-- ================= SEO ================= --}}
<div class="card shadow border-0 mt-4">

    <div class="card-header bg-dark text-white">
        SEO Settings
    </div>

    <div class="card-body">

        <input type="text"
               name="meta_title"
               class="form-control mb-2"
               placeholder="Meta Title"
               value="{{ old('meta_title', $industry->meta_title ?? '') }}">

        <textarea
            name="meta_description"
            class="form-control mb-2"
            placeholder="Meta Description">{{ old('meta_description', $industry->meta_description ?? '') }}</textarea>

        <textarea
            name="meta_keywords"
            class="form-control"
            placeholder="Meta Keywords">{{ old('meta_keywords', $industry->meta_keywords ?? '') }}</textarea>

    </div>

</div>


{{-- ================= ACTIONS ================= --}}
<div class="text-end mt-4">

    <a href="{{ route('admin.industries.index') }}"
       class="btn btn-light border">
        Cancel
    </a>

    <button class="btn btn-primary px-4">
        Save Industry
    </button>

</div>
```

</div>

@include('partials.industryScript')
