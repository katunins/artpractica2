<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

$files = Storage::files('public/uploads/mainscreenimages');


$mainScreenPictures = DB::table('mainscreen')->get();
if (count ($mainScreenPictures) == 0) {
    // создадим начальные 4 картинки в таблице
    for ($i=1; $i <=4; $i++) { 
        DB::table('mainscreen')->insert([
            'id'=>$i,
            'link' => 'http://artpractica.ru'
        ]);
    }
};
?>

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

<form id="formLoader" action="{{ route('updateMainScreenPictures') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="main-picture-form">

        @for ($i = 1; $i <=4; $i++) <div class="main-picture-block">
            <?php
            $data = DB::table('mainscreen')->where('id', $i)->get()[0];
            ?>
            <p>Фотография {{ $i }}</p>
            @if (Storage::has('public/uploads/mainscreenimages/'.$i.'.jpg')) 
            <img src="{{ Storage::url('public/uploads/mainscreenimages/'.$i.'.jpg') }}" alt="">
            @else
            <img src="{{ asset('images/empty.png') }}" alt="">
            @endif
            <br>
            <label for="main-img-{{ $i }}">Загрузите фотографию</label>
            <input id="main-img-{{ $i }}" type="file" name="main-img-{{ $i }}" value="">
            <br>
            Кнопка<input type="text" name="main-button-{{ $i }}" value="{{ $data->button }}">
            Ссылка<input type="text" name="main-link-{{ $i }}" value="{{ $data->link }}">
            
    </div>
    <hr>
    @endfor

    </div>
    <br>
    <input class="submit" type="submit" name="submit" value="Сохранить">
</form>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelector ('.preloader-block').classList.add ('hide')
        document.getElementById ('formLoader').onsubmit = function () {
            document.querySelector ('.preloader-block').classList.remove ('hide')
        }
    })
</script>