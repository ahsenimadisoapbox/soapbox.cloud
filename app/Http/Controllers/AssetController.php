<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use MatthiasMullie\Minify;

class AssetController extends Controller
{
    public function css()
    {
        return Cache::rememberForever('minified_css_v1', function () {
            $minifier = new Minify\CSS();

            $minifier->add(public_path('css/style.css'));

            return response($minifier->minify(), 200)
                ->header('Content-Type', 'text/css')
                ->header('Cache-Control', 'public, max-age=31536000');
        });
    }

    public function js()
    {
        return Cache::rememberForever('minified_js_v1', function () {
            $minifier = new Minify\JS();

            $minifier->add(public_path('js/script.js'));

            return response($minifier->minify(), 200)
                ->header('Content-Type', 'application/javascript')
                ->header('Cache-Control', 'public, max-age=31536000');
        });
    }
}