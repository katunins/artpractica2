<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href={{ asset('css/one-portfolio.css') }}>
</head>



<body>
    @include ('alt-header')
    <div class="container">
        <div class="title">
            {{ $data->title }}
        </div>

        <div class="img">
            <img src="{{ Storage::url($data->title_image) }}" alt="">
        </div>

        <div class="description">
            {{ $data->description }}
        </div>
        <div class="black-button">
            <a  href="">Посмотреть похожие работы</a>
        </div>

        <?php $images = json_decode ($data->images);?>
        
        @if (count ($images) > 0)
        @foreach ($images as $item)
        <div class="img">
            <img src="{{ Storage::url($item) }}" alt="">
        </div>
        @endforeach
        @endif

        {{-- <div class="back-link">
    <a href="{{}}">Назад</a>
    </div> --}}

    </div>
</body>

</html>


<?php
// dd ($data);
?>