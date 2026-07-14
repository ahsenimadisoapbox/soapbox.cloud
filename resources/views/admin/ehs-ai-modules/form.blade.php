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
            <strong>AI Module Information</strong>
        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $ehsAiModule->name ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Slug</label>

                    <input
                        type="text"
                        name="slug"
                        class="form-control"
                        value="{{ old('slug', $ehsAiModule->slug ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label>Status</label>

                    <select name="status" class="form-select">
                        <option value="1"
                            {{ old('status', $ehsAiModule->status ?? 1) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $ehsAiModule->status ?? 1) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Sort Order</label>

                    <input
                        type="number"
                        name="sort_order"
                        class="form-control"
                        value="{{ old('sort_order', $ehsAiModule->sort_order ?? 0) }}">
                </div>

            </div>

        </div>

    </div>

    {{-- ================= HERO ================= --}}
    <div class="card shadow border-0 mb-4">

        <div class="card-header bg-primary text-white">
            <strong>Hero Section</strong>
        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-12">
                    <label>Hero Title</label>

                    <input
                        type="text"
                        name="hero_title"
                        class="form-control"
                        value="{{ old('hero_title', $ehsAiModule->hero_title ?? '') }}">
                </div>

                <div class="col-md-12">
                    <label>Hero Headline</label>

                    <input
                        type="text"
                        name="hero_headline"
                        class="form-control"
                        value="{{ old('hero_headline', $ehsAiModule->hero_headline ?? '') }}">
                </div>

                <div class="col-md-12">
                    <label>Hero Copy</label>

                    <textarea
                        name="hero_copy"
                        rows="6"
                        class="form-control">{{ old('hero_copy', $ehsAiModule->hero_copy ?? '') }}</textarea>
                </div>
                <div class="col-md-6">

                    <label>Banner Image</label>

                    <input
                        type="file"
                        name="banner_image"
                        class="form-control">

                    @if(!empty($ehsAiModule->banner_image))

                        <img
                            src="{{ asset($ehsAiModule->banner_image) }}"
                            width="120"
                            class="img-thumbnail mt-2">

                    @endif

                </div>
                <div class="col-md-6">

                    <label>AI Assist Image</label>

                    <input
                        type="file"
                        name="ai_assist_image"
                        class="form-control">

                    @if(!empty($ehsAiModule->ai_assist_image))

                        <img
                            src="{{ asset($ehsAiModule->ai_assist_image) }}"
                            width="120"
                            class="img-thumbnail mt-2">

                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- ================= WHY AI ASSIST ================= --}}
    <div class="card shadow border-0 mb-4">

        <div class="card-header bg-info text-white">
            <strong>Why This Module Needs AI Assist</strong>
        </div>

        <div class="card-body">
            @include('partials.editor', [
                        'name' => 'why_ai_assist',
                        'id' => 'why_ai',
                        'value' => old('why_ai_assist', $ehsAiModule->why_ai_assist ?? ''),
                    ])


        </div>

    </div>
    <div class="card shadow border-0 mb-4 mt-4">

    <div class="card-header bg-secondary text-white">
        <strong>Help Section Icon</strong>
    </div>

    <div class="card-body">

        <label>Help Icon Class / Emoji / SVG Class</label>

        <input
            type="text"
            name="help_icon"
            class="form-control"
            placeholder="Example: bi bi-cpu-fill"
            value="{{ old('help_icon', $ehsAiModule->help_icon ?? '') }}">

    </div>

</div>

    {{-- ================= HUMAN IN LOOP ================= --}}
    <div class="card shadow border-0 mb-4">

        <div class="card-header bg-success text-white">
            <strong>Human In The Loop Assurance</strong>
        </div>

        <div class="card-body">

        @include('partials.editor', [
                        'name' => 'human_loop_description',
                        'id' => 'human_loop',
                        'value' => old('human_loop_description', $ehsAiModule->human_loop_description ?? ''),
                    ])

            <!-- <textarea
                name="human_loop_description"
                rows="8"
                class="form-control">{{ old('human_loop_description', $ehsAiModule->human_loop_description ?? '') }}</textarea> -->

        </div>

    </div>

    {{-- ================= REPEATERS ================= --}}
    <div class="accordion" id="ehsAiAccordion">

        {{-- What AI Helps With --}}
        @include('partials.repeater-card', [
            'id' => 'help_item',
            'title' => 'What EHS AI Assist Helps With',
            'items' => $ehsAiModule->helpItems ?? [],
            'fields' => ['title', 'description']
        ])

        {{-- Trust Points --}}
        @include('partials.repeater-card', [
            'id' => 'trust_point',
            'title' => 'Trust Points',
            'items' => $ehsAiModule->trustPoints ?? [],
            'fields' => ['title']
        ])

        {{-- Business Outcomes --}}
        @include('partials.repeater-card', [
            'id' => 'business_outcome',
            'title' => 'Business Outcomes',
            'items' => $ehsAiModule->businessOutcomes ?? [],
            'fields' => ['title', 'description']
        ])

    </div>
    <div class="card shadow border-0 mb-4 mt-4">

    <div class="card-header bg-secondary text-white">
        <strong>Business Outcome Section Icon</strong>
    </div>

    <div class="card-body">

        <label>Business Outcome Icon Class / Emoji / SVG Class</label>

        <input
            type="text"
            name="business_outcome_icon"
            class="form-control"
            placeholder="Example: bi bi-graph-up-arrow"
            value="{{ old('business_outcome_icon', $ehsAiModule->business_outcome_icon ?? '') }}">

    </div>

</div>

    {{-- ================= CTA ================= --}}
    <div class="card shadow border-0 mt-4">

        <div class="card-header bg-warning">
            <strong>CTA Section</strong>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <label>CTA Title</label>

                <input
                    type="text"
                    name="cta_title"
                    class="form-control"
                    value="{{ old('cta_title', $ehsAiModule->cta_title ?? '') }}">
            </div>

            <div class="mb-3">
                <label>CTA Description</label>

                <textarea
                    name="cta_description"
                    rows="5"
                    class="form-control">{{ old('cta_description', $ehsAiModule->cta_description ?? '') }}</textarea>
            </div>

        </div>

    </div>

    {{-- ================= SEO ================= --}}
    <div class="card shadow border-0 mt-4">

        <div class="card-header bg-dark text-white">
            SEO Settings
        </div>

        <div class="card-body">

            <input
                type="text"
                name="meta_title"
                class="form-control mb-2"
                placeholder="Meta Title"
                value="{{ old('meta_title', $ehsAiModule->meta_title ?? '') }}">

            <textarea
                name="meta_description"
                class="form-control mb-2"
                placeholder="Meta Description">{{ old('meta_description', $ehsAiModule->meta_description ?? '') }}</textarea>

            <textarea
                name="meta_keywords"
                class="form-control"
                placeholder="Meta Keywords">{{ old('meta_keywords', $ehsAiModule->meta_keywords ?? '') }}</textarea>

        </div>

    </div>

    {{-- ================= ACTIONS ================= --}}
    <div class="text-end mt-4">

        <a
            href="{{ route('ehs-ai-modules.index') }}"
            class="btn btn-light border">

            Cancel

        </a>

        <button class="btn btn-primary px-4">
            Save AI Module
        </button>

    </div>

</div>

@include('partials.ehsAiModuleScript')