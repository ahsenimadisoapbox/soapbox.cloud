<link rel="canonical" href="{{ url()->current() }}" />

<title>{{$title}}</title>
<meta name="description" content="{{$description}}">
<meta name="keywords" content="{{$keywords}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/logo.png') }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ asset('images/logo.png') }}">