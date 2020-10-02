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
    $projectData = UploadController::getOneProject($id);
?>
<form class="post-form" id="formLoader" action="{{ route('updateproject') }}" method="post"
    enctype="multipart/form-data">
    <div>

        @csrf
        <input type="hidden" name="id" value="<?=$projectData->id?>">
        <div class="form-group newproject">
            <input type="text" id="title" name="title" value="<?=$projectData->title?>">
        </div>
        <div class="form-group">
            <textarea name="description" rows="10"><?=$projectData->description?></textarea>
        </div>

        <div class="editproject-img">
            <div class="">
                <img src="{{ Storage::url($projectData->title_image) }}" alt="">
                <div>Выберете главную картинку</div>
                <input id="title-img" type="file" name="title-image">
            </div>
        </div>
        <hr>



        <div class="editproject-img">

            <?php
            $images = json_decode ($projectData->images);
            
            ?>

            @if (count ($images) > 0)
            @foreach ($images as $item)
            <div class="">
                <img src="{{ Storage::url($item) }}" alt="">
                <div class="edit_picture">
                    <a
                        href="{{ Route('changepicture', ['id'=>$projectData->id, 'file'=>$item, 'direction'=>-1]) }}">Вверх</a>
                    <a
                        href="{{ Route('changepicture', ['id'=>$projectData->id, 'file'=>$item, 'direction'=>1]) }}">Вниз</a>
                    <a class="remove_picture"
                        href="{{ Route('changepicture', ['id'=>$projectData->id, 'file'=>$item, 'direction'=>0]) }}">Удалить</a>

                </div>
            </div>

            @endforeach
            @endif

            <hr style="margin-top: 30px">
            <div class="img-loader-block">
                <span>Добавьте изображения в проект</span>
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
            <?php 
            echo '<li><input type="checkbox" class="tags-checkbox" '.(strpos ($projectData->tags, $tag->code)!==false?' checked ':' ').'value="'.$tag->code.'">'.$tag->name.'</li>';
            ?>
            @endforeach
            @endif
        </ul>


        <div class="form-group newproject">
            <label for="sort">Сортировка</label>
            <div class="form-group">
                <input id="sort" type="number" min="0" max="1000" name="sort" value="<?=$projectData->sort?>">
            </div>
        </div>


        {{-- <div class="form-group">
            <br>
            <p>Разместить на главной странице?</p>
            <select id="mainscreen" name="mainscreen">
                <option value="">Не размещать на главной</option>
                <option value=2>Поставить первой</option>
                <option value=3>Поставить второй</option>
                <option value=4>Поставить 3й</option>
                <option value=5>Поставить 4й</option>
            </select>
        </div> --}}

    </div>

</form>

@endsection

<script>
    function updateTags (){
        var result = ''
                document.querySelectorAll('.tags-checkbox').forEach(e=>{
                    if (e.checked) result += e.value + '||'
                })
                // console.log (result)
                document.getElementById('tags').value = result
    }
    document.addEventListener('DOMContentLoaded', function(){
        updateTags()

        // document.querySelector ('.preloader-block').classList.add ('hide')
        document.getElementById ('formLoader').addEventListener('submit', function () {
            // console.log (document.querySelector ('.preloader-block').classList)
            document.querySelector ('.preloader-block').classList.remove ('hide')
        })

        document.querySelectorAll('.tags-checkbox').forEach(elem=>{
            elem.addEventListener('change', ()=>{
                updateTags()
            })
        })

        // document.querySelector('.submit').addEventListener('click', function(event){
        //     console.log ('aa',event)
        //     file = new FileReader();
        //     file.process = function (ev){
        //         console.log (file.result)
        //     }
        // })

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