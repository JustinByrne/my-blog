<link rel="canonical" href="{{ url()->full() }}" />
<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="{{ $type }}" />
<meta property="og:title" content="{{ $title != $site_name && ! is_null($title) ? ucwords($title) . ' | ' . $site_name : $site_name }}" />
<meta property="og:description" content="" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:site_name" content="{{ $site_name }}" />

@if (! is_null($image))
    <meta property="og:image" content="{{ $image }}" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1080" />
@endif

@if ($type == 'article')
    @php
        $tags = [];
        foreach ($model->tags as $tag) {
            array_push($tags, $tag->name);
        }
    @endphp
    <meta property="article:published_time" content="{{ $model->published_at->format('c') }}" />
    <meta property="article:modified_time" content="{{ $model->updated_at->format('c') }}" />
    <meta property="article:author" content="{{ $model->author->name }}" />
    <meta property="article:tag" content="{{ implode(', ', $tags) }}" />
    <meta name="twitter:card" content="summary_large_image" />
    @if (! is_null($twitter))
        <meta name="twitter:creator" content="{{ $twitter }}" />
        <meta name="twitter:site" content="{{ $twitter }}" />
    @endif
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="{{ $model->author->name }}" />
    <meta name="twitter:label2" content="Estimated reading time" />
    <meta name="twitter:data2" content="{{ $time }}" />
@endif