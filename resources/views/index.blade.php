@php
    use App\Models\Substance;
@endphp

@extends('layout.app')

@section('title', 'Поиск лекарств')

@section('content')
    <h1>Поиск лекарств</h1>

    <form method="POST" action="/search">
        <div class="col-4">
            <div class="form-group">
                <label>Список веществ</label>
                <select class="selectpicker" name="substanceIds[]" multiple data-live-search="true">
                @foreach (Substance::list() as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
                </select>
            </div>
        </div>

        @foreach ($errors->all() as $error)
            <div class="text-danger">{{ $error }}</div>
        @endforeach

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <button type="submit" class="btn btn-primary">Поиск</button>
    </form>
@endsection
