@extends('layout.app')

@section('title', 'Вещества')

@section('content')
    <h1>Добавить вещество</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('substances.store') }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <input name="visible" type="hidden" value="0"/>
                <label for="visible">Видимость</label>
                <input type="checkbox" id="visible" name="visible" checked value="1">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
