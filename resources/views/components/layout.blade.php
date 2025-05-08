@props(['page_title'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title ?? "Laravel Blog Example" }}</title>
    <meta name="author" content="Kiss Márk">
    <meta name="description" content="Laravel example of blog posts">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/resets.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
</head>
<body>
{{--include header--}}
<x-partial.header/>
<main>
    {{--insert main content--}}
    {{$slot}}
</main>

</body>
</html>
