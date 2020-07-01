<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/one-portfolio.css">
</head>

<header>
    
</header>
<body>
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
    <?php
    $images = json_decode ($data->images);
    // print_r ($images);
    ?>
    @foreach ($images as $item)
        <div class="img">
        <img src="{{ Storage::url($item) }}" alt="">
        </div>
    @endforeach

    {{-- <div class="back-link">
    <a href="{{}}">Назад</a>
    </div> --}}

</div>
</body>
</html>


<?php
// dd ($data);
?>