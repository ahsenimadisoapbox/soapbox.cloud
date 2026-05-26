@php
$url = url()->current();
$title = trim($__env->yieldContent('title', 'SoapBox.cloud'));

$schema = [];

/*
|--------------------------------------------------------------------------
| Organization
|--------------------------------------------------------------------------
*/
$schema[] = [
    "@type" => "Organization",
    "@id"   => "https://soapbox.cloud/#organization",
    "name"  => "SoapBox",
    "url"   => "https://soapbox.cloud/",
    "logo"  => [
        "@type" => "ImageObject",
        "url"   => asset('images/logo.png')
    ],
    "sameAs" => [
        "https://www.instagram.com/soapbox.cloud/",
        "https://www.facebook.com/soapboxsoftwaresolutions/",
        "https://www.linkedin.com/company/soapboxgroup/",
        "https://in.pinterest.com/soapboxsoftwaresolutions/",
        "https://x.com/SoapBox_in"
    ]
];

/*
|--------------------------------------------------------------------------
| Website
|--------------------------------------------------------------------------
*/
$schema[] = [
    "@type" => "WebSite",
    "@id"   => "https://soapbox.cloud/#website",
    "url"   => "https://soapbox.cloud/",
    "name"  => "SoapBox",
    "publisher" => [
        "@id" => "https://soapbox.cloud/#organization"
    ]
];

/*
|--------------------------------------------------------------------------
| WebPage
|--------------------------------------------------------------------------
*/
$schema[] = [
    "@type" => "WebPage",
    "@id"   => $url . "#webpage",
    "url"   => $url,
    "name"  => $title,
    "isPartOf" => [
        "@id" => "https://soapbox.cloud/#website"
    ],
    "about" => [
        "@id" => "https://soapbox.cloud/#organization"
    ]
];

/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/
if (request()->is('/')) {
    $schema[] = [
        "@type" => "BreadcrumbList",
        "@id"   => "https://soapbox.cloud/#breadcrumb",
        "itemListElement" => [
            [
                "@type"    => "ListItem",
                "position" => 1,
                "name"     => "Home",
                "item"     => "https://soapbox.cloud/"
            ]
        ]
    ];
}

/*
|--------------------------------------------------------------------------
| Who We Are
|--------------------------------------------------------------------------
*/
if (request()->is('who-we-are')) {
    $schema[] = [
        "@type" => "AboutPage",
        "@id"   => $url . "#about",
        "url"   => $url,
        "name"  => "Who We Are",
        "founder" => [
            "@type" => "Person",
            "name"  => "Mohammed Moizuddin"
        ]
    ];
}

/*
|--------------------------------------------------------------------------
| Modules
|--------------------------------------------------------------------------
*/
if (request()->is('modules')) {
    $schema[] = [
        "@type" => "CollectionPage",
        "@id"   => $url . "#modules",
        "url"   => $url,
        "name"  => "Modules"
    ];
}

/*
|--------------------------------------------------------------------------
| Blogs
|--------------------------------------------------------------------------
*/
if (request()->is('blogs')) {
    $schema[] = [
        "@type" => "Article",
        "@id"   => $url . "#blog",
        "url"   => $url,
        "name"  => "SoapBox Blogs"
    ];
}

// Inject dynamic page schema safely
$pageSchema = $__env->yieldContent('pageSchema');

if (!empty($pageSchema)) {
    $decoded = json_decode($pageSchema, true);

    if (is_array($decoded)) {
        $schema[] = $decoded;
    }
}

$jsonSchema = [
    "@context" => "https://schema.org",
    "@graph"   => $schema
];
@endphp

<script type="application/ld+json">
{!! json_encode($jsonSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
