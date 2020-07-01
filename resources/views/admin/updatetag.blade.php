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
    <form action="{{ route('unpdatetag-submit', $data->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Название тега</label>
            <input type="text" id="name" name="name" placeholder="Загородные дома" value="{{$data->name}}">
            </div>
            <div class="form-group">
            <label for="code">Код тега</label>
            <input type="text" id="code" name="code" placeholder="country-house" value="{{$data->code}}">
            </div>
            <div class="form-group">
            <label for="sort">Сортировка</label>
            <input type="number" id="sort" name="sort" placeholder="430" value="{{$data->sort}}">
            </div>
            <input class="submit" type="submit" name="submit" value="Изменить">
        </form>
    </div>
@endsection