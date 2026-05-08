@extends('layouts.frontend')
@section('meta')
@include('partials.meta', [
    'title' => $blog->meta_title ?? $blog->title . ' | SOAPBOX.CLOUD™',
    'description' => $blog->meta_description ?? $blog->short_description ?? Str::limit(strip_tags($blog->content), 160),
    'keywords' => $blog->meta_keywords ?? 'cloud os, regulated workflows, compliance workflow management, compliance software, audit management software, risk management software, workflow automation, regulated enterprise software, safety management software, quality management software, enterprise compliance platform, audit ready compliance, operational resilience, cloud native compliance',
])
@endsection
@section('pageSchema')
{
  "@type":"BlogPosting",
  "@id":"{{ url()->current() }}#article",
  "headline":"{{ $blog->title }}",
  "description":"{{ $blog->meta_description }}",
  "datePublished":"{{ $blog->created_at->toDateString() }}",
  "dateModified":"{{ $blog->updated_at->toDateString() }}",
  "author":{
    "@type":"Organization",
    "name":"SoapBox"
  },
  "publisher":{
    "@id":"https://soapbox.cloud/#organization"
  },
  "mainEntityOfPage":"{{ url()->current() }}"
}
@endsection
@section('content')
@php
    $url = urlencode(url()->current());
    $title = urlencode($blog->title);
@endphp
<div class="container pt-5 pb-5">
    <h1 class="fw-bold mb-3">{{ $blog->title }}</h1>
    <p class="text-muted fw-semibold">{{ $blog->created_at->format('F j, Y') }}</p>
    <div class="row g-4">
        <div class="col-lg-8">

            @if($blog->image)
                <img src="{{ asset($blog->image) }}" class="img-fluid rounded mb-4"
                    alt="{{ $blog->image_alt ?? $blog->title }}" loading="lazy">
            @endif

            <div class="blog-content">
                {!! $blog->content !!}
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card bg-primary-subtle border-0 rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Post Author</h5>
                    <div class="row">
                        <div class="col-3">
                            <div class="post-icon-box">
                                <p>ST</p>
                            </div>
                        </div>
                        <div class="col-9 my-auto">
                            <h5 class="fw-bold mb-0">Soapbox.Cloud Team</h5>
                            <p class="text-muted mb-0">Editorial Team</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-warning-subtle border-0 rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Share this article</h5>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank"
                                class="nav-link text-dark ps-0 pe-4">
                                <i class="fab fa-facebook-f fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://api.whatsapp.com/send?text={{ $title }}%0A%0A{{ $url }}" target="_blank"
                                class="nav-link text-dark ps-0 pe-4">
                                <i class="fab fa-whatsapp fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/intent/tweet?text={{ $title }}%0A%0A&url={{ $url }}"
                                target="_blank" class="nav-link text-dark ps-0 pe-4">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}" target="_blank"
                                class="nav-link text-dark ps-0 pe-4">
                                <i class="fab fa-linkedin-in fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="toc-wrapper d-none d-lg-block">
                <div id="toc-container">
                    <div class="card bg-body-secondary border-0 rounded-4 mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Table of Contents</h5>
                            <ul id="toc-list" class="list-unstyled small"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pb-150">
    <div class="row g-4">
        <div class="col-md-6">
            @if($previousBlog)
            <a href="{{ route('blogs.show', $previousBlog->slug) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 rounded-4 hover-card">
                    <div class="card-body">
                        <small class="text-muted d-block mb-2">
                            <i class="fas fa-arrow-left me-1"></i> Previous Post
                        </small>
                        <h6 class="fw-bold text-dark mb-0">
                            {{ $previousBlog->title }}
                        </h6>
                    </div>
                </div>
            </a>
            @endif
        </div>
    
        <div class="col-md-6">
            @if($nextBlog)
            <a href="{{ route('blogs.show', $nextBlog->slug) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 rounded-4 hover-card text-md-end">
                    <div class="card-body">
                        <small class="text-muted d-block mb-2">
                            Next Post <i class="fas fa-arrow-right ms-1"></i>
                        </small>
                        <h6 class="fw-bold text-dark mb-0">
                            {{ $nextBlog->title }}
                        </h6>
                    </div>
                </div>
            </a>
            @endif
        </div>
    
    </div>
    
    
    {{-- Related Blogs --}}
    @if($relatedBlogs->count())
    <section class="mt-5 pt-4">
        <h3 class="fw-bold mb-4">Related Articles</h3>
    
        <div class="row g-4">
    
            @foreach($relatedBlogs as $item)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">
    
                    @if($item->image)
                    <img src="{{ asset($item->image) }}"
                         class="card-img-top rounded-top-4"
                         style="height:220px; object-fit:cover;"
                         alt="{{ $item->title }}" loading="lazy">
                    @endif
    
                    <div class="card-body d-flex flex-column">
                        <small class="text-muted mb-2">
                            {{ $item->created_at->format('M d, Y') }}
                        </small>
    
                        <h5 class="fw-bold mb-3">
                            {{ Str::limit($item->title, 55) }}
                        </h5>
    
                        <p class="text-muted small flex-grow-1 mb-0">
                            {{ Str::limit(strip_tags($item->content), 90) }}
                        </p>
                        
                        <a href="{{ route('blogs.show', $item->slug) }}" class="stretched-link"></a>
                    </div>
    
                </div>
            </div>
            @endforeach
    
        </div>
    </section>
    @endif
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const content = document.querySelector(".blog-content");
    const tocList = document.getElementById("toc-list");
    const tocContainer = document.getElementById("toc-container");
    const container = document.querySelector(".container.pt-5.pb-150");

    const headings = content.querySelectorAll("h1, h2, h3, h4, h5, h6");

    const offset = 140;
    const stickyStart = 360; // 🔥 start sticky after 360px

    /* ---------- Generate Table of Contents ---------- */

    headings.forEach((heading, index) => {

        const id = "heading-" + index;
        heading.id = id;

        const li = document.createElement("li");
        li.classList.add("mb-3");

        // indent for H3 (you can extend for H4+ if needed)
        if (heading.tagName === "H3") {
            li.classList.add("ms-3");
        }

        const link = document.createElement("a");
        link.href = "#" + id;
        link.textContent = heading.innerText;
        link.className = "text-decoration-none text-dark";

        link.addEventListener("click", function (e) {
            e.preventDefault();

            const target = document.getElementById(id);
            const y = target.getBoundingClientRect().top + window.pageYOffset - offset;

            window.scrollTo({
                top: y,
                behavior: "smooth"
            });
        });

        li.appendChild(link);
        tocList.appendChild(li);

    });

    /* ---------- Sticky TOC (Desktop Only) ---------- */

    function handleSticky() {

        if (!tocContainer || !container) return;

        // ❌ Disable sticky on mobile
        if (window.innerWidth <= 768) {
            tocContainer.classList.remove("toc-fixed", "toc-bottom");
            tocContainer.style.position = "relative";
            return;
        }

        const scrollTop = window.scrollY;

        // 🔥 NEW: don't activate before 200px
        if (scrollTop < stickyStart) {
            tocContainer.classList.remove("toc-fixed", "toc-bottom");
            return;
        }

        const containerTop = container.offsetTop;
        const containerBottom = containerTop + container.offsetHeight;
        const tocHeight = tocContainer.offsetHeight;

        // ✅ Normal sticky state
        if (
            scrollTop + offset > containerTop &&
            scrollTop + tocHeight + offset < containerBottom
        ) {
            tocContainer.classList.remove("toc-bottom");
            tocContainer.classList.add("toc-fixed");

        }
        // ✅ Stick to bottom when reaching container end
        else if (scrollTop + tocHeight + offset >= containerBottom) {

            tocContainer.classList.remove("toc-fixed");
            tocContainer.classList.add("toc-bottom");

        }
        // ✅ Default state
        else {

            tocContainer.classList.remove("toc-fixed", "toc-bottom");

        }
    }

    // 🔥 Run on scroll
    window.addEventListener("scroll", handleSticky);
    window.addEventListener("resize", handleSticky);

    // 🔥 Run once on load (important)
    handleSticky();

});
</script>
@endsection