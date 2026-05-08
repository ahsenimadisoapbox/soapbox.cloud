@extends('layouts.backend')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">FAQs</h4>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
        + Add FAQ
    </a>
</div>

<div class="accordion" id="faqAccordion">

    @forelse($faqs as $page => $groupFaqs)
        <div class="accordion-item mb-2">

            {{-- Page Title --}}
            <h2 class="accordion-header" id="heading-{{ Str::slug($page ?? 'general') }}">
                <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ Str::slug($page ?? 'general') }}">
                    <strong>{{ $page ?? 'General' }}</strong>
                </button>
            </h2>

            {{-- Page FAQs --}}
            <div id="collapse-{{ Str::slug($page ?? 'general') }}"
                 class="accordion-collapse collapse"
                 data-bs-parent="#faqAccordion">

                <div class="accordion-body p-0">

                    <div class="list-group list-group-flush">

                        @foreach($groupFaqs as $faq)
                            <div class="list-group-item">

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $faq->question }}</strong>
                                        <div class="text-muted small">
                                            Sort: {{ $faq->sort_order }}
                                        </div>
                                    </div>

                                    <div>
                                        <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Delete this FAQ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    @empty
        <div class="text-center py-4">
            No FAQs found
        </div>
    @endforelse

</div>
@endsection