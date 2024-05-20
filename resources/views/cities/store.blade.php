@extends('layouts.app')
@section('title','Добавления города')
@section('content')
    <h1>Добавления города</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="name">Названия город:</label><br>
        <input type="text" id="name" class="form-control" name="name"><br>
        <!-- <label for="slug">Названия:</label><br>
        <input type="text" id="slug" name="slug"><br><br> -->
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
    @endsection
