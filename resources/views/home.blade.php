<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Студия дизайна Artpractica</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="wow-animation/animate.min.css">
</head>

<body>
    <div class="head">
        <div class="head-arrow-block">

            <div class="head-arrow">
                <svg style="fill: white " width="38.417px" height="18.592px">
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
    </div>
    <div class="container">


        <div class="title-text">
            491 завершенный проект с 2003 года
        </div>

        <div class="" style="text-align: center; margin-bottom: 20px;">
            <svg style="fill: grey;" width="38.417px" height="18.592px">
                <path
                    d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z">
                </path>
            </svg>
        </div>

        <div style="text-align: center">
            <a href="" class="black-button">Посмотреть работы</a>
        </div>

        <div class="gallery-grid">
            <figure class="gallery-item-1">
                <div style="background-image: url(/images/sec_vers/image_1.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>

            </figure>

            <figure class="gallery-item-2">
                <div style="background-image: url(/images/sec_vers/image_2.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>
            </figure>

            <figure class="gallery-item-3">
                <div style="background-image: url(/images/sec_vers/image_4.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>
            </figure>

            <figure class="gallery-item-4">
                <div style="background-image: url(/images/sec_vers/image_3.jpg)">
                    <a href="" class="black-mini-button">Подробнее</a>
                </div>
            </figure>
        </div>

        <div class="title-text">
            Проектируем и воплощаем в жизнь
        </div>

        <div class="direction">
            <div>
                <h3>Реализация проекта под ключ</h3>
                <a href="">подробнее</a>
            </div>
            <div>
                <h3>Полная комплектация проекта</h3>
                <a href="">подробнее</a>
            </div>
            <div>
                <h3>Собственное мебельное производтсво</h3>
                <a href="">подробнее</a>
            </div>
        </div>

        <div class="ceo">
            <div class="ceo-text">
                <h3>Балашова Людмила</h3>
                <h5>руководитель студии</h5>
                <p>"Сколько себя помню, я - дизайнер интерьера!
                    </br></br>
                    По-началу это было вольное плавание, потом появились
                    единомышленники и наша "ARTPRACTICA". Ответственный подход ,
                    неравнодушие и целеустремленность двигали нас вперед.
                    И теперь ARTPRACTCICA - большая команда профессионалов, э
                    то целый комплекс услуг по созданию интерьеров, это огромный
                    опыт работы с объектами разной величины и направленности.
                </p>
            </div>
            <div class="ceo-portrait">
            </div>
        </div>

        <div class="team-text">
            <h3>Команда исполнителей</h3>
            <p>17 лет своей плодотворной работы мы сформировали надежную бригаду профессионалов:
                6 дизайнеров-архитекторов, 3 менеджера по продажам и закупкам,
                3 конструктора мебели, бригада работников мебельного производства и многочисленная строительная бригада.
            </p>
        </div>

        <div class="team-grid">
            <figure class="team-item-1">
                <div style="background-image: url(/images/sec_vers/image_5.jpg)">
                </div>

            </figure>

            <figure class="team-item-2">

                <div style="background-image: url(/images/sec_vers/image_6.jpg)">

                </div>
            </figure>

            <figure class="team-item-3">
                <div style="background-image: url(/images/sec_vers/image_9.jpg)">
                </div>
            </figure>

            <figure class="team-item-4">
                <div style="background-image: url(/images/sec_vers/image_7.jpg)">
                </div>
            </figure>

            <figure class="team-item-5">
                <div style="background-image: url(/images/sec_vers/image_8.jpg)">
                </div>
            </figure>
        </div>

        <div class="form">
            {{-- <h3>Расскажите нам про вашу задачу, оставьте контакты. Мы свяжемся с вами в ближайшее время</h3> --}}
            <h3>Остались вопросы?</h3>
            <form action="{{ route('form') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Ваше имя">
                <input type="tel" name="tel" placeholder="+7(999)999 99 99">
                <textarea name="message" id="" cols="30" rows="7" placeholder="Ваше сообщение"></textarea>
                {{-- <input type="text" placeholder="Ваше сообщение"> --}}
                <input class="submit" type="submit" name="submit" value="Отправить">
            </form>
        </div>
</body>

</html>