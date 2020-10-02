<?php
    use App\Http\Controllers\SqlController; 
    $tags = SqlController::gettag();
    $lastSort = 0;
    if (count($tags)>0) $lastSort = $tags->last()->sort;
    $lastSort +=20;
?>

@extends('admin/index')

@section('content')

@if ($errors->any())
<div class="errors">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form">
    <form action="{{ route('newtag-submit')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Название тега</label>
            <input type="text" id="name" name="name" placeholder="Загородные дома">
        </div>
        <div class="form-group">
            <label for="code">Код тега</label>
            <input type="text" id="code" name="code" placeholder="country-house">
        </div>
        <div class="form-group">
            <label for="sort">Сортировка</label>
            <input type="number" id="sort" name="sort" value="{{ $lastSort }}">
        </div>
        <input class="submit" type="submit" name="submit" value="Сохранить">
    </form>
</div>
@endsection

<script>
    function transliterate(word) {
    var answer = "";
    var a = {}

    a["Ё"] = "YO"; a["Й"] = "I"; a["Ц"] = "TS"; a["У"] = "U"; a["К"] = "K"; a["Е"] = "E"; a["Н"] = "N"; a["Г"] = "G"; a["Ш"] = "SH"; a["Щ"] = "SCH"; a["З"] = "Z"; a["Х"] = "H"; a["Ъ"] = "'";
    a["ё"] = "yo"; a["й"] = "i"; a["ц"] = "ts"; a["у"] = "u"; a["к"] = "k"; a["е"] = "e"; a["н"] = "n"; a["г"] = "g"; a["ш"] = "sh"; a["щ"] = "sch"; a["з"] = "z"; a["х"] = "h"; a["ъ"] = "'";
    a["Ф"] = "F"; a["Ы"] = "I"; a["В"] = "V"; a["А"] = "a"; a["П"] = "P"; a["Р"] = "R"; a["О"] = "O"; a["Л"] = "L"; a["Д"] = "D"; a["Ж"] = "ZH"; a["Э"] = "E";
    a["ф"] = "f"; a["ы"] = "i"; a["в"] = "v"; a["а"] = "a"; a["п"] = "p"; a["р"] = "r"; a["о"] = "o"; a["л"] = "l"; a["д"] = "d"; a["ж"] = "zh"; a["э"] = "e";
    a["Я"] = "Ya"; a["Ч"] = "CH"; a["С"] = "S"; a["М"] = "M"; a["И"] = "I"; a["Т"] = "T"; a["Ь"] = "'"; a["Б"] = "B"; a["Ю"] = "YU";
    a["я"] = "ya"; a["ч"] = "ch"; a["с"] = "s"; a["м"] = "m"; a["и"] = "i"; a["т"] = "t"; a["ь"] = "'"; a["б"] = "b"; a["ю"] = "yu";

    for (i = 0; i < word.length; ++i) {

        answer += a[word[i]] === undefined ? word[i] : a[word[i]];
    }
    return answer.replace(/[^a-zA-Z0-9-_]/g, '-');;
}

document.addEventListener('DOMContentLoaded', function (){
    let inputName = document.getElementById ('name')
    let inputCode = document.getElementById ('code')
    inputName.oninput = function (){
        let codeData = transliterate (inputName.value)
        inputCode.value = codeData
        inputCode.placeholder = codeData
    }
})
</script>