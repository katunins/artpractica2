<?php
    use App\Http\Controllers\SqlController; 
    $data = SqlController::gettag();            
?>
@extends('admin/index')

@section('content')
<table>
    <tr>
        <th class="table1">Сортировка</th>
        <th class="table2">Название</th>
        <th class="table3">Код</th>
        <th class="table3">Действия</th>
    </tr>
    @if (count($data)>0)
    @foreach ($data as $item)
    <tr>
        <td><?=$item->sort?></td>
        <td><?=$item->name?></td>
        <td><?=$item->code?></td>
        <td>
            <a href="{{ route('updatetag', $item->id) }}" class="button-edit">✍</a>
            <a href="{{ route('tagremove', $item->id) }}" class="button-del"
                message="Удалить тег '<?=$item->name?>'">␡</a>
            {{-- <a href="#modal_open" class="button-del">␡</a> --}}
        </td>
    </tr>
    @endforeach
    @endif
</table>
<a href="{{ route('newtag') }}"><div class="plus_tag">+</div></a>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelectorAll('.button-del').forEach(elem=>{
            elem.addEventListener('click', (event)=>{
            var href = event.target.href
            var message = event.target.getAttribute('message')
            event.preventDefault();
            document.querySelector('.my_modal-title').innerHTML = 'Удаление тега'
            document.querySelector('.my_modal-body').innerHTML = '<p>'+message+'?</p>'
            document.getElementById('modal_open').style.display = 'flex'
            document.getElementById('delete-button').setAttribute('onclick',"location.href = '"+href+"'")
            
        })
        })   
    })
</script>