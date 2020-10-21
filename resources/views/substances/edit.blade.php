@extends('layout.app')

@section('title', 'Вещества')

@section('content')
    <h1>Редактировать вещество</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('substances.update', ['substance' => $substance->id]) }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name', $substance->name)}}">
            </div>

            <div class="form-group">
                <input name="visible" type="hidden" value="0"/>
                <label for="visible">Видимость</label>
                <input type="checkbox" id="visible" name="visible" value="1" {{ $substance->visible ? 'checked' : '' }}>
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input type="hidden" name="_method" value="put"/>
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection