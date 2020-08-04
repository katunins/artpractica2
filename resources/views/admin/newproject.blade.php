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
    $tags = SqlController::gettag();            
?>

<form class="post-form" action="{{ route('newprojectupload') }}" method="post" enctype="multipart/form-data">
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
                <input id="title-img" type="file" name="title-image">
            </div>
            <div class="img-loader-block">
                <span>Загрузите остальные изображения</span>
                <input id="img" type="file" multiple name="image[]">
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

        {{-- <div class="form-group newproject">
            <label for="code">Символьный код<br></label>
            <input type="text" id="code" name="code" placeholder="Moscow-City 44sq">
        </div> --}}


        <div class="form-group newproject">
            <label for="sort">Сортировка</label>
            <div class="form-group">
                <input id="sort" type="number" min="0" max="1000" name="sort" placeholder="250">
            </div>
        </div>

    </div>
</form>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelectorAll('.tags-checkbox').forEach(elem=>{
            elem.addEventListener('change', ()=>{
                var result = ''
                document.querySelectorAll('.tags-checkbox').forEach(e=>{
                    if (e.checked) result += e.value + '||'
                })
                // console.log (result)
                document.getElementById('tags').value = result
            })
        })

        // document.querySelector('.submit').addEventListener('click', function(event){
        //     console.log ('aa',event)
        //     file = new FileReader();
        //     file.process = function (ev){
        //         console.log (file.result)
        //     }
        // })

        document.querySelector('form').addEventListener('submit', function(event){
            
            // console.log ('aa',event)
            file = new FileReader();
            console.log (file)
            // alert()
            file.process = function (ev){
                console.log ('f',file.result)
            }
        })
    })
</script>