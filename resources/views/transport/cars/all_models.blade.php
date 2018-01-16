@extends('transport.cars.app')

@section('content')
    <h4>Все модели.</h4>
    <ul>
        @if(!empty($allModels))
            @foreach($allModels as $item)
                <li><a href="{{ route('car.service', [$item['model_id']]) }}">{{ $item['name'] }}</a></li>
            @endforeach
        @else
            <li>Нет моделей</li>
        @endif
    </ul>
@stop