@extends('layout.app')

@section('title', 'Вещества')

@section('content')
    <h1>Список веществ</h1>

    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Ид</th>
                <th scope="col">Название</th>
                <th scope="col">Видимость</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($substances as $substance)
            <tr>
                <td>{{ $substance->id }}</td>
                <td>{{ $substance->name }}</td>
                <td>{{ $substance->visible ? 'Да' : 'Нет' }}</td>
                <td>
                    <form method="POST" action="{{ route('substances.destroy', ['substance' => $substance->id]) }}">
                        <a class="btn btn-primary" href="{{ route('substances.show', ['substance' => $substance->id]) }}">Просмотр</a>
                        <a class="btn btn-primary" href="{{ route('substances.edit', ['substance' => $substance->id]) }}">Редактировать</a>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>

                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>

        <a class="btn btn-primary" href="{{ route('substances.create') }}">Добавить</a>
    </div>
@endsection