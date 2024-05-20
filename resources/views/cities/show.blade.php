@extends('layouts.app')
@section('title',$city->name)
@section('content')
    <p>Дополнительная информация о городе {{ $city->name }}</p>
     
     <ul>
        @foreach($cities as $city)
        <li class="my-2">
            <div class="row">
                <div class="col">
                    <a href="{{ route('city.show', ['city' => $city->slug]) }}" 
                    @if(session('city') && session('city')->id === $city->id) style="font-weight: bolder" @endif>
                    {{ $city->name }}
                     </a>
                </div>
                <div class="col">
                    <form action="{{ route('delete', $city->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
        </div>
    </li>
    @endforeach
</ul>
@endsection