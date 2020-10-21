@extends('layout.app')

@section('title', 'Лекарства')

@section('content')
    <h1>Лекарство номер {{ $drug->id }}</h1>

    <div class=col-4>
        <div class="card">
            <div class="card-body">
                Название: {{ $drug->name }}
            </div>
            <div class="card-body">
                Видимость: {{ $drug->isVisible() ? 'Да' : 'Нет' }}
            </div>
            <div class="card-body">
                Состав: {{ implode(', ', $drug->getConsist()) }}
            </div>
        </div>
    </div>

@endsection