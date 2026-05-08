<div class="accordion-item mb-2">
    <h2 class="accordion-header">
        <a class="accordion-button collapsed text-decoration-none cursor-pointer" 
                data-bs-toggle="collapse" 
                data-bs-target="#framework">
            Frameworks
        </a>
    </h2>

    <div id="framework" class="accordion-collapse collapse">
        <div class="accordion-body">

            <div id="framework-wrapper">

                @if(isset($module) && $module->frameworks->count())

                    @foreach($module->frameworks as $i => $item)
                    <div class="row mb-2">

                        <div class="col-md-11">
                            <input type="text" 
                                   name="frameworks[{{ $i }}][name]" 
                                   value="{{ $item->name }}" 
                                   class="form-control" 
                                   placeholder="Framework Name">
                        </div>

                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger remove-framework">
                                X
                            </button>
                        </div>

                    </div>
                    @endforeach

                @else

                    {{-- Default Row --}}
                    <div class="row mb-2">

                        <div class="col-md-11">
                            <input type="text" 
                                   name="frameworks[0][name]" 
                                   class="form-control" 
                                   placeholder="Framework Name">
                        </div>

                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-danger remove-framework">
                                X
                            </button>
                        </div>

                    </div>

                @endif

            </div>

            {{-- Add Button --}}
            <button type="button" class="btn btn-success mt-2 add-framework">
                + Add Framework
            </button>

        </div>
    </div>
</div>