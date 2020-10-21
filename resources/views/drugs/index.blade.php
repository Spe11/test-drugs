@extends('layout.app')

@section('title', 'Лекарства')

@section('content')
    <h1>Список лекарств</h1>

    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Ид</th>
                <th scope="col">Название</th>
                <th scope="col">Видимость</th>
                <th scope="col">Состав</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($drugs as $drug)
            <tr>
                <td>{{ $drug->id }}</td>
                <td>{{ $drug->name }}</td>
                <td>{{ $drug->isVisible() ? 'Да' : 'Нет' }}</td>
                <td>{{ implode(', ', $drug->getConsist()) }}</td>
                <td>
                    <form method="POST" action="{{ route('drugs.destroy', ['drug' => $drug->id]) }}">
                        <a class="btn btn-primary" href="{{ route('drugs.show', ['drug' => $drug->id]) }}">Просмотр</a>
                        <a class="btn btn-primary" href="{{ route('drugs.edit', ['drug' => $drug->id]) }}">Редактировать</a>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>

                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>

        <a class="btn btn-primary" href="{{ route('drugs.create') }}">Добавить</a>
    </div>
@endsection