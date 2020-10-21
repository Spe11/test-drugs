@php
    use App\Models\Substance;
@endphp

@extends('layout.app')

@section('title', 'Лекарства')

@section('content')
    <h1>Редактировать лекарство</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('drugs.update', ['drug' => $drug->id]) }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name', $drug->name)}}">
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

            <input type="hidden" name="_method" value="put"/>
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection