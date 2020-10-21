@extends('layout.app')

@section('title', 'Вещества')

@section('content')
    <h1>Вещество номер {{ $substance->id }}</h1>

    <div class=col-4>
        <div class="card">
            <div class="card-body">
                Название: {{ $substance->name }}
            </div>
            <div class="card-body">
                Видимость: {{ $substance->visible ? 'Да' : 'Нет' }}
            </div>
        </div>
    </div>

@endsection