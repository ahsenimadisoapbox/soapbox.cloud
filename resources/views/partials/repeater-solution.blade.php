<div class="accordion-item mb-2">
    <h2 class="accordion-header">
        <a class="accordion-button collapsed text-decoration-none cursor-pointer" data-bs-toggle="collapse"
            data-bs-target="#solution">
            Solutions
        </a>
    </h2>

    <div id="solution" class="accordion-collapse collapse">
        <div class="accordion-body">

            <div class="mb-3">
                <label>Solution Heading</label>
                <input type="text" name="solution_heading" class="form-control"
                    value="{{ old('solution_heading', $module->solution_heading ?? '') }}">
            </div>

            <div id="solution-wrapper">

                @if(isset($module) && $module->solutions->count())

                    @foreach($module->solutions as $i => $item)
                        <div class="row mb-2">

                            <div class="col-md-3">
                                <input type="text" name="solutions[{{ $i }}][name]" value="{{ $item->name }}"
                                    class="form-control" placeholder="Name">
                            </div>

                            <div class="col-md-5">
                                @include('partials.editor', [
                                    'name' => "solutions[$i][description]",
                                    'id' => "solutions_{$i}_description",
                                    'value' => old("solutions.$i.description", $item->description ?? ''),
                                ])
                            </div>

                            <div class="col-md-3">
                                <input type="file" name="solutions[{{ $i }}][image]" class="form-control">

                                @if($item->image)
                                    <div class="mt-2">
                                        <img src="{{ asset($item->image) }}" class="img-thumbnail" width="60">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-1 text-end">
                                <button type="button" class="btn btn-danger remove-solution">
                                    X
                                </button>
                            </div>

                        </div>
                    @endforeach

                @else

                    {{-- Default row --}}
                    <div class="row mb-2">

                        <div class="col-md-3">
                            <input type="text" name="solutions[0][name]" class="form-control" placeholder="Name">
                        </div>

                        <div class="col-md-5">
                            <input type="text" name="solutions[0][description]" class="form-control"
                                placeholder="Description">
                        </div>

                        <div class="col-md-3">
                            <input type="file" name="solutions[0][image]" class="form-control">
                        </div>

                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger remove-solution">
                                X
                            </button>
                        </div>

                    </div>

                @endif

            </div>

            <button type="button" class="btn btn-success mt-2 add-solution">
                + Add Solution
            </button>

        </div>
    </div>
</div>