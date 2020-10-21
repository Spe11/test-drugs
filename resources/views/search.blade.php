@extends('layout.app')

@section('title', 'Результат поиска')

@section('content')
    <h1>Результат поиска</h1>

    @if ($drugs->isEmpty())
        <div>
            Не найдено лекарств
        </div>
    @else
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ид</th>
                    <th scope="col">Название</th>
                    <th scope="col">Видимость</th>
                    <th scope="col">Состав</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($drugs as $drug)
                <tr>
                    <td>{{ $drug->id }}</td>
                    <td>{{ $drug->name }}</td>
                    <td>{{ $drug->isVisible() ? 'Да' : 'Нет' }}</td>
                    <td>{{ implode(', ', $drug->getConsist()) }}</td>
            @endforeach
            </tbody>
            </table>
        </div>
    @endif
@endsection
