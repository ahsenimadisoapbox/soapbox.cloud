<div class="accordion-item mb-2">
    <h2 class="accordion-header">
        <a class="accordion-button collapsed text-decoration-none cursor-pointer" data-bs-toggle="collapse"
            data-bs-target="#{{ $id }}">
            {{ $title }}
        </a>
    </h2>

    <div id="{{ $id }}" class="accordion-collapse collapse">
        <div class="accordion-body">

            <div id="{{ $id }}-wrapper">

                @if ($id == 'challenger')
                    <div class="mb-3">
                        <label>Challenger Heading</label>
                        <input type="text" name="challenger_heading" class="form-control"
                            value="{{ old('challenger_heading', $module->challenger_heading ?? '') }}">
                    </div>
                @endif

                @foreach($items as $i => $item)
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <input type="text" name="{{ $id }}s[{{ $i }}][name]" value="{{ $item->name }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="{{ $id }}s[{{ $i }}][description]" value="{{ $item->description }}"
                                class="form-control">
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger remove-{{ $id }}">X</button>
                        </div>
                    </div>
                @endforeach

            </div>

            <button type="button" class="btn btn-success add-{{ $id }}">+ Add</button>

        </div>
    </div>
</div>