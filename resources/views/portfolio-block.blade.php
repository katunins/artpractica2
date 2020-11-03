<link rel="stylesheet" href="{{asset ('css/portfolio-block.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
<?php
    use App\Http\Controllers\UploadController; 
    use App\Http\Controllers\SqlController; 
    use Intervention\Image\ImageManagerStatic as Image;
    // use Illuminate\Support\Facades\Storage;


    $portfolios = UploadController::getPortfolios();
    $tags = SqlController::gettag();   
    
    // определяет тип загруженной титульной фотографии
    function GetImgType ($url) {
        $metadata = getimagesize('storage/'.$url);
        $result = $metadata[0]/$metadata[1];
        $result = $metadata[0]/$metadata[1];
        // $result = round($metadata[0]/$metadata[1], 2);
        if ($result >2) $result = 2;//защита от слишком длинных изображений
        if ($result <1) $result = 1;//сделаем вертикальную фотографию квадратной
            return $result; 
        }
?>

{{-- <link rel="stylesheet" href={{asset("/css/portfolio.css")}}> --}}

<div class="content">
    <div class="tag-group">
        {{-- правка Артпрактика один выбранный тег--}}
        {{-- <a href="{{Route('portfolio')}}">
        <div class="tag-clear">
            Сбросить фильтр
        </div>
        </a> --}}
        <div class="tag active" value='all'>Все проекты</div>
        {{--  --}}

        @foreach ($tags as $item)
        <div class="tag" value=<?=$item->code?>>
            <?=$item->name?>
        </div>
        @endforeach

    </div>
    <div class="portfolio-block-group">
        <?php $delay = 0;?>


        @foreach ($portfolios as $item)
        <div data-wow-delay="{{ $delay }}s"
            class="portfolio-block wow animate__animated animate__fadeIn animate__faster" tags=<?=$item->tags?>
            landWidth=<?=GetImgType ($item->title_image)?>>
            <?php $delay += 0.1; if ($delay >1) $delay = 0;?>

            <a href="{{ route('get-portfolio', $item->id) }}">
                <div class="portfolio-img-block"
                    style="background-image: url({{asset('storage/'.$item->title_image)}})">
                    {{-- style="background-image: url({{Storage::url($portfolios[$i]->title_image)}})"> --}}
                    <div class="label">
                        <p>{{$item->title }}</p>
                    </div>
                </div>

            </a>
            @if ($_SERVER['REQUEST_URI'] == "/admin/editportfolio")
            <div class="edit-block">
                <a href="{{ route('editoneproject', $item->id) }}" class="button-edit">Редактировать</a>
                <a href="{{ route('deteteportfolio', $item->id) }}" class="button-del"
                    message="<?=$item->title ?>">Удалить</a>
                <span class="sort">{{ $item->sort }}</span>
            </div>

            @endif
        </div>
        @endforeach




        @if ($_SERVER['REQUEST_URI'] == "/admin/editportfolio")
        <div class="block" tags="">
            <a href="{{ route('newproject') }}">
                <div class="img-block plus">+</div>
            </a>

        </div>
        @endif
    </div>
    <a href="{{Route('home')}}">
        <div class="black-button">
            Назад
        </div>
    </a>
</div>
@include('footer')

<script src={{asset ('js/portfolio-block.js')}}></script>
<script src={{asset ('wow-animation/wow.min.js')}}></script>
<script>
    new WOW().init();
</script>