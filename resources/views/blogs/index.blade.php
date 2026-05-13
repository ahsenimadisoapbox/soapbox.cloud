@extends('layouts.frontend')

@section('meta')
@include('partials.meta', [
    'title' => $meta->meta_title ?? 'SOAPBOX.CLOUD™ | Intelligent Platform for Responsible Enterprises',
    'description' => $meta->meta_description ?? 'Manage compliance, safety, and risk workflows in one enterprise operating system. Soapbox Cloud helps regulated teams automate and stay audit-ready.',
    'keywords' => $meta->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection

@section('content')
<div class="container py-5">
    <div class="row g-4">

        <!-- LEFT: Featured Blog -->
        <div class="col-lg-8">

            @if($featured)
                <div class="card border-0 h-100">
                    <img src="{{ asset($featured->image) }}" class="card-img-top rounded feature-image" alt="{{ $featured->title }}" loading="lazy">

                    <div class="card-body px-0 pt-4">
                        <h2 class="fw-bold fs-32 mb-3">
                            {{ $featured->title }}
                        </h2>

                        <p class="text-muted mb-2">
                            By {{ $featured->author ?? 'Admin' }}
                        </p>

                        <p class="text-muted">
                            {!! Str::limit(strip_tags($featured->short_description), 250) !!}
                        </p>

                        <a href="{{ route('blogs.show', $featured->slug) }}" class="stretched-link"></a>
                    </div>
                </div>
            @endif

        </div>

        <!-- RIGHT: Trending Posts -->
        <div class="col-lg-4">

            @if ($trendingBlogs->count())
            
                <h4 class="fw-bold mb-4">Trending Posts</h4>

                @foreach($trendingBlogs as $trend)
                    <div class="d-flex mb-4 align-items-start">

                        <!-- Image -->
                        <div class="me-3">
                            <img src="{{ asset($trend->image) }}"
                                class="tread-image"
                                alt="{{ $trend->title }}" loading="lazy">
                        </div>

                        <!-- Content -->
                        <div style="width: calc(100% - 110px);">
                            <h6 class="fw-bold mb-1" class="fs-16">
                                <a href="{{ route('blogs.show', $trend->slug) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($trend->title, 70) }}
                                </a>
                            </h6>

                            <small class="text-muted">
                                By {{ $trend->author ?? 'Admin' }}
                            </small>
                        </div>

                    </div>
                @endforeach

            @endif

        </div>

        @if (!$featured && !$latestBlogs->count())
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <h4 class="fw-bold mb-3">No blogs found</h4>
                    <p class="text-muted mb-0">Please check back later for updates.</p>
                </div>
            </div>
        </div>
        @endif

        @if ($latestBlogs->count())
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0">Latest Blogs</h3>
                </div>

                <div class="row g-4">
                    @foreach($latestBlogs as $blog)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 h-100 shadow-sm">
                                <img src="{{ asset($blog->image) }}"
                                    class="card-img-top rounded-top"
                                    alt="{{ $blog->image_alt ?? $blog->title }}"
                                    loading="lazy"
                                    style="height: 220px; object-fit: cover;">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="fw-bold mb-2">
                                        <a href="{{ route('blogs.show', $blog->slug) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($blog->title, 80) }}
                                        </a>
                                    </h5>

                                    <p class="text-muted small mb-2">
                                        By {{ $blog->author ?? 'Admin' }}
                                    </p>

                                    <p class="text-muted mb-4">
                                        {!! Str::limit(strip_tags($blog->short_description), 130) !!}
                                    </p>

                                    <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-outline-primary btn-sm mt-auto align-self-start">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $latestBlogs->links() }}
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
