<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document2</title>
  <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
  <div class="head">
    <h1>Админ панель</h1>
    <ul>
      {{-- <li><a href="{{ route('newtag') }}">Создать новый тег</a></li> --}}
      {{-- <li><a href="{{ route('taglist') }}">Редактировать теги</a></li> --}}
      <li><a href="{{ route('taglist') }}">Теги</a></li>
      {{-- </ul>
<ul> --}}
      {{-- <li><a href="{{ route('newproject') }}">Добавить новый проект</a></li> --}}
      {{-- <li><a href="{{ route('editportfolio') }}">Редактировать проекты</a></li> --}}
      <li><a href="{{ route('editportfolio') }}">Проекты</a></li>
    </ul>
  </div>

  <div class="tags">
    <?php 
            use App\Http\Controllers\SqlController; 
            $data = SqlController::gettag();
            
            foreach ($data as $item) {
                echo '<li class="one-tag">';
                echo $item->name;
                echo '</li>';
            }
        ?>
  </div>

  @yield('content')

  <div id="modal_open" class="my_modal">
    <div class="my_modal-dialog">
      <div class="my_modal-content">
        <div class="my_modal-header">
          <p class="my_modal-title">Заголовок модального окна</p>
        </div>
        <div class="my_modal-body">
          <p>Здесь прописана текстовая информация модального окна ...</p>

        </div>
        <div class="modal-buttons">
          {{-- <a href="">Удалить</a> --}}
          <button id="delete-button" onclick="">Удалить</button>
          <button onclick="document.getElementById('modal_open').style.display='none'">Отменить</button>
        </div>
      </div>
    </div>
  </div>
</body>

</body>

</html>