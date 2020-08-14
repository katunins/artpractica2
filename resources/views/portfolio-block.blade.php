<link rel="stylesheet" href="{{asset ('css/portfolio-block.css')}}">
<?php

    use App\Http\Controllers\UploadController; 
    use App\Http\Controllers\SqlController; 
    // use Illuminate\Support\Facades\Storage;


    $portfolios = UploadController::getPortfolios();
    $tags = SqlController::gettag();   

    // определяет тип загруженной титульной фотографии
    function GetImgType ($url) {
        $metadata = getimagesize('storage/'.$url);
        $result = $metadata[0]/$metadata[1];

        // if ($result > 1.4) return 'pano';
        // if ($result < 1) return 'vert';
        // if ($result == 1) return 'square';
        // if ($result < 1.1) return 'land';
        // return 'land';

    $result = $metadata[0]/$metadata[1];
    // $result = round($metadata[0]/$metadata[1], 2);
    if ($result >2) $result = 2;//защита от слишком длинных изображений
    if ($result <1) $result = 1;//сделаем вертикальную фотографию квадратной
            return $result; 
        }
?>

<link rel="stylesheet" href="/css/portfolio.css">

<div class="content">
    <div class="tag-group">
        @foreach ($tags as $item)
        <div class="tag" value=<?=$item->code?>>
            <?=$item->name?>
        </div>
        @endforeach
    </div>
    <div class="portfolio-block-group">
        @for ($i = 0; $i < $portfolios->count(); $i++)


            <div class="portfolio-block" tags=<?=$portfolios[$i]->tags?>
                
                landWidth=<?=GetImgType ($portfolios[$i]->title_image)?>>
                <a href="{{ route('get-portfolio', $portfolios[$i]->id) }}">
                    <div class="portfolio-img-block"
                        style="background-image: url({{asset('storage/'.$portfolios[$i]->title_image)}})"></div>
                    {{-- <div class="link">
                        {{$portfolios[$i]->title }}
            </div> --}}

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
</div>

<script src="{{asset ('js/portfolio-block.js')}}"></script>