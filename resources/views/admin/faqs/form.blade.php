<div class="mb-3">
    <label class="form-label">Question</label>
    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Answer</label>
    <textarea name="answer" class="form-control" rows="3" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Page</label>
        <select name="page" class="form-select" required>
            <option value="">Select Page</option>
            <option value="home" {{ (old('page', $faq->page ?? '') == 'home') ? 'selected' : '' }}>
                Home
            </option>
            <option value="who-we-are" {{ (old('page', $faq->page ?? '') == 'who-we-are') ? 'selected' : '' }}>
                Who We Are
            </option>
            <option value="modules" {{ (old('page', $faq->page ?? '') == 'modules') ? 'selected' : '' }}>
                Modules
            </option>
            <option value="eap" {{ (old('page', $faq->page ?? '') == 'eap') ? 'selected' : '' }}>
                Early Access Program
            </option>
            <option class="fw-bold" disabled>Module</option>
            @foreach($modules as $module)
                <option value="{{ $module->name }}" {{ (old('page', $faq->page ?? '') == $module->name) ? 'selected' : '' }}>
                    {{ $module->name }}
                </option>
            @endforeach
            <option class="fw-bold" disabled>Blog</option>
            @foreach($blogs as $blog)
                <option value="{{ $blog->title }}" {{ (old('page', $faq->page ?? '') == $blog->title) ? 'selected' : '' }}>
                    {{ $blog->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control"
            value="{{ old('sort_order', $faq->sort_order ?? 0) }}">
    </div>
</div>