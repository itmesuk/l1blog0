@extends('layouts.frontend')
<<<<<<< HEAD
@section('title', 'รายการสินค้า')
@section('content')
    <br><br>
    <div class="row py-5 bg-light">
        <div class="col">
            {!! Form::open(['url' => 'foo/bar']) !!}
            {!! Form::label('email', 'E-Mail Address') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            {!! Form::close() !!}
            <hr>
            {!! link_to('products.create', $title = 'เพิ่มสินค้า', ['class' => 'btn btn-primary']) !!}
=======
@section('titile', 'รายการสินค้า')
@section('content')
<br><br>
    <div class="row py-5 bg-light">
        <div class="col">
            {!! Form::open(['url' => 'foo/bar']) !!}
            {!! Form::label('text', 'ข้อมูลสินค้า') !!}
            {!! Form::text('text', null, ['class' => 'form-control']) !!}
            {!! Form::close() !!}
            <hr>
            {!! link_to('product/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-primary'], $secure = null) !!}
>>>>>>> 573d081ebfd03645833ad272f04964de6cad2815
        </div>
    </div>
@endsection
