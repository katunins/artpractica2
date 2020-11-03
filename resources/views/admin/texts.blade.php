@extends('admin/index')

@section('content')

<?php 
function getData($code) {
    $result = DB::table('textdata')->get()->where('code', $code)->first();
    return $result ? $result->text : '';
}
?>
@foreach (DB::table('textdata')->get() as $item)
    <form class="block" action="{{ Route('setSiteText') }}" method="POST">
        @csrf
    
        <h3>{{ $item->name }}</h3>
        <textarea name="text">{{ $item->text }}</textarea>
        <input type="hidden" name="code" value={{ $item->code }}>
    
        <input class="submit" type="submit" name="submit" value="Сохранить">
    </form>
@endforeach



@endsection