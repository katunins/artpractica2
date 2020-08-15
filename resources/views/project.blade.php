<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{ asset('css/one-portfolio.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />

</head>

<?php
use \App\Http\Controllers\SqlController; 

// получим название тегов
$tag_href = '';
$tags = explode ('||', $data->tags);
$Currenttags = array ();
foreach (SqlController::gettag() as $tag) {
    if (in_array($tag->code, $tags)) {
        $Currenttags [$tag->code] = $tag->name;
        $tag_href .=$tag->code.'&';
    }
}



?>

<body>
    @include ('alt-header')
    <div class="container">
        <div class="title portfolio-block wow animate__animated animate__fadeIn wow">
            {{ $data->title }}
        </div>

        <div class="img portfolio-block wow animate__animated animate__fadeIn wow">
            <img src="{{ Storage::url($data->title_image) }}" alt="">
        </div>

        <div class="description portfolio-block wow animate__animated animate__fadeIn wow">
            {{ $data->description }}
        </div>

        <div class="all_tags_name">

            @foreach ($Currenttags as $one_tag)
            <li><?=$one_tag?></li>
            @endforeach
        </div>

        <div class="black-button portfolio-block wow animate__animated animate__fadeIn wow">
            <a href="{{route('portfolio')}}?<?=substr($tag_href,0,-1)?>">Другие проекты из этой серии</a>
        </div>

        <?php $images = json_decode ($data->images);?>

        @if (count ($images) > 0)
        @foreach ($images as $item)
        <div class="img portfolio-block wow animate__animated animate__fadeIn wow">
            <img src="{{ Storage::url($item) }}" alt="">
        </div>
        @endforeach
        @endif
        <div class="black-button portfolio-block wow animate__animated animate__fadeIn wow">
            <a href="{{route('portfolio')}}">Посмотреть все проекты</a>
        </div>
    </div>

    @include('footer')
</body>

</html>
<script src={{asset ('wow-animation/wow.min.js')}}></script>
<script>
    new WOW().init();
</script>