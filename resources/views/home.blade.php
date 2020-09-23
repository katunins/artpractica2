<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Студия дизайна Artpractica</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <script src="js/home.js"></script>
</head>

<body>
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
        <div class="utp">
            Студия дизайна интерьера полного цикла в Воронеже:<br>
            разрабатываем дизайн-проекты и воплощаем их в жизнь
        </div>

        <div class="utp-mobile">
            Студия дизайна интерьера полного цикла в Воронеже: разрабатываем дизайн-проекты и воплощаем их в жизнь
        </div>
    </div>
    <div class="container">
        <div class="block">
            <div class="title-text">
                491 завершенный проект с 2003 года
            </div>

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
            <figure class="gallery-item-1">
                <div data-wow-delay="0.0s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_1.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>

            </figure>

            <figure class="gallery-item-2">
                <div data-wow-delay="0.1s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_2.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>
            </figure>

            <figure class="gallery-item-3">
                <div data-wow-delay="0.3s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_4.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>
            </figure>

            <figure class="gallery-item-4">
                <div data-wow-delay="0.5s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_3.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>
            </figure>
        </div>

        <div class="title-text mobile-space">
            Проектируем и воплощаем в жизнь
        </div>

        <div class="direction">
            <div data-wow-delay="0.0s" class="wow animate__animated animate__fadeInLeft">
                <h3>Реализация проекта под ключ</h3>
                <button>подробнее</button>
                <div class="details hide">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam deserunt similique, excepturi in
                        vero
                        harum quis perspiciatis, sit soluta quasi numquam laboriosam autem libero at. Dicta praesentium
                        perferendis ullam amet?</p>
                    <img src="/images/team.jpg" alt="">
                </div>
            </div>
            <div data-wow-delay="0.2s" class="wow animate__animated animate__fadeInRight">
                <h3>Полная комплектация проекта</h3>
                <button>подробнее</button>
                <div class="details hide">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam deserunt similique, excepturi in vero
                    harum quis perspiciatis, sit soluta quasi numquam laboriosam autem libero at. Dicta praesentium
                    perferendis ullam amet?
                </div>
            </div>
            <div data-wow-delay="0.4s" class="wow animate__animated animate__fadeInLeft">
                <h3>Собственное мебельное производтсво</h3>
                <button>подробнее</button>
                <div class="details hide">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam deserunt similique, excepturi in vero
                    harum quis perspiciatis, sit soluta quasi numquam laboriosam autem libero at. Dicta praesentium
                    perferendis ullam amet?
                </div>
            </div>
        </div>

        <div class="ceo">
            <div class="ceo-text">
                <h3>Балашова Людмила</h3>
                <h5>руководитель студии</h5>
                <p class="ceo-quote">"Сколько себя помню, я - дизайнер интерьера!"</p>
                <p class="ceo-about">Я Арт-директор, дизайнер, автор инсталляций в Парке Горького, Саду им. Баумана,
                    саду «Эрмитаж». В
                    основном наша команда проектирует классические интерьеры. В 2019 году мы спроектирвоали 25
                    объектов в стиле Loft. У нас собственные ресурсы и опыт - это позволяет выполнять практически любые
                    задачи</p>
            </div>
            <div class="ceo-portrait wow animate__animated animate__fadeIn">
            </div>
        </div>

        <div class="ceo">
            <div class="ceo-text">
                <h3>Балашова Людмила</h3>
                <h5>руководитель студии</h5>
                <p class="ceo-about-2">
                    
                        &quot; Арт практика сегодня - это надежная и успешная команда профессионалов. Мы идем в ногу со временем и
                        всегда открыты для новых задач в проектировании и реализации вашей среды обитания &quot;
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
                <div data-wow-delay="0.0s" class="wow animate__animated animate__fadeIn"
                    style="background-image: url(/images/sec_vers/image_5.jpg)">
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


        <div class="team-grid">

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
        </div>



        <div class="arrow">
            <svg style="fill: grey;" width="38.417px" height="18.592px">
                <path
                    d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z">
                </path>
            </svg>
        </div>

        <div class="team-text">
            <p>
                &quot; Арт практика сегодня - это надежная и успешная команда профессионалов. Мы идем в ногу со временем и
                всегда открыты для новых задач в проектировании и реализации вашей среды обитания &quot;
            </p>
        </div>

        <div class="form">
            {{-- <h3>Расскажите нам про вашу задачу, оставьте контакты. Мы свяжемся с вами в ближайшее время</h3> --}}
            <h3>Остались вопросы?</h3>
            <form {{--action="{{ route('form') }}"--}} method="POST">
                @csrf
                <input type="text" name="name" placeholder="Ваше имя">
                <input type="tel" name="tel" placeholder="+7(999)999 99 99">
                <textarea name="message" id="" cols="30" rows="7" placeholder="Ваше сообщение"></textarea>
                {{-- <input type="text" placeholder="Ваше сообщение"> --}}
                <input class="submit" type="submit" name="submit" value="Отправить">
            </form>
        </div>
    </div>
    @include('footer')
</body>

</html>
<script src={{asset ('wow-animation/wow.min.js')}}></script>
<script>
    new WOW().init();
</script>