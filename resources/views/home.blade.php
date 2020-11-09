<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Студия дизайна Artpractica</title>
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <script src="js/home.js"></script>
</head>

<body>
    <?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

$mainScreenPictures = DB::table('mainscreen')->get();
if (count ($mainScreenPictures) == 0) {
    // создадим начальные 4 картинки в таблице
    for ($i=1; $i <=4; $i++) { 
        DB::table('mainscreen')->insert([
            'id'=>$i,
            'imgUrl'=>'public/uploads/mainscreenimages/empty.jpg',
            'link' => '/portfolio'
        ]);
    }
};


function getData($code) {
    $result = DB::table('textdata')->get()->where('code', $code)->first()->text;
    return $result;
}

?>

    <div class="head">
        <div class="headlogo">

            <img class="wow animate__animated animate__fadeIn animate__slow" src="/images/sec_vers/logo.png" alt="">

        </div>
        <div class="headinst">
            <a href="https://www.instagram.com/art_practica/" target="_blank">
                <img src="/images/sec_vers/inst.png" alt="" class="wow animate__animated animate__bounceInLeft">
            </a>
            <a href="tel:+79202134222">
                <img src="/images/sec_vers/tel.png" alt=""
                    class="wow animate__animated animate__bounceInLeft animate__slow">
            </a>
        </div>
        <div class="head-arrow-block">
            <div class="head-arrow">
                <svg class="arrow-anim" style="fill: white " width="38.417px" height="18.592px">
                    <path
                        d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z">
                    </path>
                </svg>
            </div>

        </div>
            <div class="utp">{!! getData('utp') !!}</div>

        <div class="utp-mobile">{!! getData('utp-mobile') !!}</div>
    </div>
    <div class="container">
        <div class="block">
            <div class="title-text">{!! getData ('how-long') !!}</div>

            <div class="arrow">
                <svg style="fill: grey;" width="38.417px" height="18.592px">
                    <path
                        d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z">
                    </path>
                </svg>
            </div>
            <div style="text-align: center" class="animate__animated animate__pulse animate__infinite">
                <a href="{{ route('portfolio') }}" class="black-button">Посмотреть работы</a>
            </div>
        </div>

        <div class="gallery-grid">
<?php
$mainscreens = DB::table('mainscreen')->get();
            for($i = 1; $i <= 4; $i++) {
                $data = $mainscreens->where('id', $i)->first();
                if (Storage::has($data->imgUrl)) {
                    $url = Storage::url($data->imgUrl);
                } else {
                    $url = Storage::url ('public/uploads/mainscreenimages/empty.jpg');
                } ?> 
                
                <figure class="gallery-item-{{ $i }}">
                <div data-wow-delay="0.{{ $i }}s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url({{ $url }})">
                    <a href="{{ $data->link }}" class="black-mini-button">{{ $data->button }}</a>
                </div>
            </figure>

            <?php } ?>

        </div>

        <div class="title-text mobile-space">{!! getData('direction-header') !!}
        </div>

        <div class="direction">
            <div data-wow-delay="0.0s" class="wow animate__animated animate__fadeInLeft">
                <h3>{!! getData('direction1-h3') !!}</h3>
                {{-- <button>подробнее</button> --}}
                <div class="details hide">
                    <p>{!! getData('direction1-p') !!}</p>
                    <img src="/images/utp-full.jpg" alt="">
                </div>
            </div>
            <div data-wow-delay="0.2s" class="wow animate__animated animate__fadeInRight">
                <h3>{!! getData('direction2-h3') !!}</h3>
                {{-- <button>подробнее</button> --}}
                <div class="details hide">
                    <p>{!! getData('direction2-p') !!}</p>
                    <img src="/images/utp-compl.jpg" alt="">
                </div>
            </div>
            <div data-wow-delay="0.4s" class="wow animate__animated animate__fadeInLeft">
                <h3>{!! getData('direction3-h3') !!}</h3>
                {{-- <button>подробнее</button> --}}
                <div class="details hide">
                    <p>{!! getData('direction3-p') !!}</p>
                    <img src="/images/utp-furniture.jpg" alt="">
                </div>
            </div>
        </div>

        {{-- <div class="video">
            <iframe width="1025" height="800" src="https://www.youtube.com/embed/2WLB4maj8Dg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> --}}
        
        <div class="ceo">
            <div class="ceo-text">
                {!! getData('ceo-header') !!}
                <p class="ceo-about-2">

                    &quot;{!! getData('ceo-text') !!}&quot;
                </p>
            </div>
            <div class="ceo-portrait wow animate__animated animate__fadeIn">
            </div>
        </div>

        <div class="arrow arrow-anim">
            <svg style="fill: grey;" width="38.417px" height="18.592px">
                <path
                    d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z">
                </path>
            </svg>
        </div>
        <div style="text-align: center">
            <a href="{{ route('portfolio') }}" class="black-button">Посмотрите наше Portfolio</a>
        </div>

        <div class="team-grid">
            <figure class="team-item-1">
                {{-- <div data-wow-delay="0.0s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_5.jpg)">
                </div> --}}
                <div data-wow-delay="0.0s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/utp-furniture.jpg)">
                </div>

            </figure>

            <figure class="team-item-2">
                <div data-wow-delay="0.2s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_6.jpg)">

                </div>
            </figure>

            <figure class="team-item-3" href="/images/sec_vers/oil.mp4">
                {{-- <div style="background-image: url(/images/sec_vers/image_9.jpg)">
                </div> --}}
                <div data-wow-delay="0.3s" class="wow animate__animated animate__fadeIn">
                    <video width="100%" height="100%" preload="auto" autoplay="true" loop="true" muted="muted">
                        <source src="/images/sec_vers/factory.mp4" type="video/mp4">
                    </video>
                </div>
            </figure>

            <figure class="team-item-4">
                <div data-wow-delay="0.4s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_7.jpg)">
                </div>
            </figure>

            <figure class="team-item-5 myBtn" href="/images/sec_vers/factory.mp4">
                <div data-wow-delay="0.5s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_8.jpg)">
                </div>
            </figure>
        </div>


        {{-- <div class="team-grid">

            <figure class="team-item-a1">
                <div data-wow-delay="0.2s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_6.jpg)">

                </div>
            </figure>

            <figure class="team-item-a2" href="/images/sec_vers/oil.mp4">
                <div data-wow-delay="0.3s" class="wow animate__animated animate__fadeIn">
                    <video width="100%" height="100%" preload="auto" autoplay="true" loop="true" muted="muted">
                        <source src="/images/sec_vers/factory.mp4" type="video/mp4">
                    </video>
                </div>
            </figure>
        </div> --}}



        <div class="arrow">
            <svg style="fill: grey;" width="38.417px" height="18.592px">
                <path
                    d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z">
                </path>
            </svg>
        </div>

        <div class="team-text">
            <p>
                &quot;{!! getData('finish-text') !!}&quot;
            </p>
        </div>

        <div class="form">
            <div id="feedback" @if (!Session::has('modal')) class="hide" @endif>
            {{ Session::get('modal') }}
            </div>
            <h3>Остались вопросы?</h3>
            <form action="{{ route('form') }}" method="POST">
                @csrf
                @honeypot
                <input type="text" name="name" placeholder="Ваше имя">

                @error('tel')
                <label class="alert">{{ $message }}</label>
                @enderror
                <input type="tel" name="tel" placeholder="+7 (___) ___-____" id="tel">

                <textarea name="message" id="" cols="30" rows="7" placeholder="Ваше сообщение"></textarea>
                {{-- <input type="text" placeholder="Ваше сообщение"> --}}
                <input class="submit" type="submit" name="submit" value="Отправить">
            </form>
        </div>
    </div>
    @include('footer')

</body>

</html>
<script src={{ asset ('wow-animation/wow.min.js') }}></script>
<script>
    new WOW().init();

</script>
<script>
    function mask (event) {
    var matrix = '+7 (___) ___-____',
        i = 0,
        def = matrix.replace (/\D/g, ''),
        val = this.value.replace (/\D/g, '');
    if (def.length >= val.length) val = def;
    this.value = matrix.replace (/./g, function (a) {
        return /[_\d]/.test (a) && i < val.length
        ? val.charAt (i++)
        : i >= val.length ? '' : a;
    });
    if (event.type == 'blur') {
        if (this.value.length == 2) this.value = '';
    } else setCursorPosition (this.value.length, this);
    }

    document.addEventListener ('DOMContentLoaded', function () {
    const elems = document.getElementById ('tel');
    elems.addEventListener ('input', mask);
    elems.addEventListener ('focus', mask);
    elems.addEventListener ('blur', mask);
    });

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
 
    ym(68999611, "init", {
         clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true,
         webvisor:true
    });
 </script>
 <noscript><div><img src="https://mc.yandex.ru/watch/68999611" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
 <!-- /Yandex.Metrika counter -->