@extends('transport.cars.app')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="{{ route('car.all') }}">На главную</a>
    <h4>Сервисы для модели: {{ $model->name }}</h4>
    <ul>
        @if(!empty($services))
            @foreach($services as $key => $item)
                <li>
                    <span>{{ $item }}</span>
                    <button class="delete_service" service_id="{{ $key }}">Удалить</button>
                </li>
            @endforeach
        @else
            <li>Нет сервисов</li>
        @endif
    </ul>

    <h4>Добавить сервис</h4>
    <form method="POST" action="{{ route('car.service.add') }}">
        {{ csrf_field() }}
        <div class="form__main">
            <div class="form__item">
                <select name="service_name">
                    <option></option>
                    @foreach($allServices as $key => $item)
                        <option value="{{ $key + 1 }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <input name="model_id" type="hidden" value="{{ $model->model_id }}">

            <input disabled class="form__item" value="{{ $model->name }}">

            <input name="price" class="form__item">

            <button class="form__item">Добавить</button>
        </div>
    </form>
@stop