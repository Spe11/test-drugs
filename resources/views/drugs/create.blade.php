@php
    use App\Models\Substance;
@endphp

@extends('layout.app')

@section('title', 'Лекарства')

@section('content')
    <h1>Добавить лекарство</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('drugs.store') }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Состав</label>
                <select class="selectpicker" name="substanceIds[]" multiple data-live-search="true">
                @foreach (Substance::list() as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
                </select>
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

    <script>
        $('select').selectpicker();
    </script>
@endsection

