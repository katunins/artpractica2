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
        <a href="{{Route('portfolio')}}">
            <div class="tag-clear">
                Сбросить фильтр
            </div>
        </a>
        @foreach ($tags as $item)
        <div class="tag" value=<?=$item->code?>>
            <?=$item->name?>
        </div>
        @endforeach

    </div>
    <div class="portfolio-block-group">
        @for ($i = 0; $i < $portfolios->count(); $i++)
            <div data-wow-delay="<?=$i/10?>s"
                class="portfolio-block wow animate__animated animate__fadeIn animate__slower"
                tags=<?=$portfolios[$i]->tags?> landWidth=<?=GetImgType ($portfolios[$i]->title_image)?>>
                <a href="{{ route('get-portfolio', $portfolios[$i]->id) }}">
                    <div class="portfolio-img-block"
                        style="background-image: url({{asset('storage/'.$portfolios[$i]->title_image)}})">
                        {{-- style="background-image: url({{Storage::url($portfolios[$i]->title_image)}})"> --}}
                        <div class="label">
                            <p>{{$portfolios[$i]->title }}</p>
                        </div>
                    </div>

                </a>
                @if ($_SERVER['REQUEST_URI'] == "/admin/editportfolio")
                <div class="edit-block">
                    <a href="{{ route('editoneproject', $portfolios[$i]->id) }}" class="button-edit">Редактировать</a>
                    <a href="{{ route('deteteportfolio', $portfolios[$i]->id) }}" class="button-del"
                        message="<?=$portfolios[$i]->title ?>">Удалить</a>
                </div>
                @endif
            </div>

            @endfor



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