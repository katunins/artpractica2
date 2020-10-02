@extends('admin/index')

@section('content')

@if($errors->any())
<div class="errors">
    <ul>
        @foreach($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif

<?php
    use App\Http\Controllers\SqlController; 
    use App\Http\Controllers\UploadController; 
    $tags = SqlController::gettag();
    $portfolios = UploadController::getPortfolios();

    $lastSort = 0;
    if (count($portfolios)>0) $lastSort = $portfolios->last()->sort;
    $lastSort +=20;
?>

<form class="post-form" id="formLoader" action="{{ route('newprojectupload') }}" method="post" enctype="multipart/form-data">
    <div>

        @csrf
        <div class="form-group newproject">
            <input type="text" id="title" name="title" placeholder="Квартира 44кв. Москва-City">
        </div>
        <div class="form-group">
            <textarea name="description" rows="10"
                placeholder="Заказчик нам принес свой проект, но с помощью нашего опыта нашим дизайнерам удалоьс уговорить клиента на снос стены. После бригада строителей заехала на объект и приступила к работе"></textarea>
        </div>
        <div class="form-group img-loader" style="text-align: left">

            <div class="img-loader-block">
                <span>Выберете главную картинку</span>
                <input id="title-img" type="file" name="title-image" value="">
            </div>
            <div class="img-loader-block">
                <span>Загрузите остальные изображения</span>
                <input id="img" type="file" multiple name="image[]" value="">
            </div>
        </div>
        <input class="submit" type="submit" name="submit" value="Сохранить">


    </div>
    <div class="tags-include">
        <div class="form-group">
            Выберете подходящие теги
        </div>
        <input type="hidden" name="tags" id="tags">
        <ul>
            @if (count ($tags) > 0)
            @foreach ($tags as $tag)

            <?php echo '<li><input type="checkbox" class="tags-checkbox" value="'.$tag->code.'">'.$tag->name.'</li>';?>
            @endforeach
            @endif
        </ul>


        <div class="form-group newproject">
            <label for="sort">Сортировка</label>
            <div class="form-group">
                <input id="sort" type="number" min="0" max="1000" name="sort" value="{{ $lastSort }}">
            </div>
        </div>

    </div>
</form>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelector ('.preloader-block').classList.add ('hide')
        document.getElementById ('formLoader').onsubmit = function () {
            document.querySelector ('.preloader-block').classList.remove ('hide')
        }

        let tags = 0
        document.querySelectorAll('.tags-checkbox').forEach(elem=>{
            tags ++
            elem.addEventListener('change', ()=>{
                var result = ''
                document.querySelectorAll('.tags-checkbox').forEach(e=>{
                    if (e.checked) result += e.value + '||'
                })
                // console.log (result)
                document.getElementById('tags').value = result
            })
        })

        if (tags == 0) {
            alert ('Для загрузки проекта необходимо выбрать хотябы один тег. Сейчас не задано ни одного тега. Создайте теги')
            window.location.replace ('/admin/newtag')
        }

        // document.querySelector('form').addEventListener('submit', function(event){
            
        //     // console.log ('aa',event)
        //     file = new FileReader();
        //     console.log (file)
        //     // alert()
        //     file.process = function (ev){
        //         console.log ('f',file.result)
        //     }
        // })
    })
</script>