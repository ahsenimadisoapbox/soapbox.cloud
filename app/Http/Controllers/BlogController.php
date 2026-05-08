<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Meta;
use Barryvdh\DomPDF\Facade\Pdf;

class BlogController extends Controller
{
    public function index()
    {
        $meta = $this->getMeta('blogs');
        $blogs = Blog::where('status', 1)
            ->orderBy('id', 'DESC')
            ->paginate(9);

        $trendingBlogs = Blog::where('status', 1)
            ->orderBy('views', 'DESC')
            ->take(5)
            ->get();
        $faqs = $this->getFaqs('blogs');
        return view('blogs.index', compact('blogs', 'meta', 'trendingBlogs', 'faqs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
        $blog->increment('views');
        $faqs = $this->getFaqs($blog->title);
        // Previous Blog
        $previousBlog = Blog::where('status', 1)
            ->where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        // Next Blog
        $nextBlog = Blog::where('status', 1)
            ->where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        // Related Blogs (Random 3 except current)
        $relatedBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('blogs.show', compact('blog', 'faqs', 'previousBlog', 'nextBlog', 'relatedBlogs'));
    }

    public function getMeta($page)
    {
        return Meta::where('page', $page)->first();
    }

    public function getFaqs($page)
    {
        return Faq::orderBy('sort_order', 'asc')->where('page', $page)->get();
    }
}
