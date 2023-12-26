@extends('layouts.frontend')
@section('titile', 'เพิ่มสินค้า')
@section('content')
    <br><br>
    <div class="row py-5 bg-light">
        <div class="col">
            {!! Form::open(['route' => 'products.store', 'file' => true, 'method' => 'POST']) !!}
            <div class="col-auto">
                {!! Form::label('name', 'ชื่อสินค้า') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-auto">
                {!! Form::label('price', 'ราคาสินค้า') !!}
                {!! Form::number('price', null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-auto">
                {!! Form::label('stock', 'จำนวนสต๊อกสินค้า') !!}
                {!! Form::number('stock', null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-auto">
                {!! Form::label('detail', 'รายละเอียดสินค้า') !!}
                {!! Form::textarea('detail', null, ['class' => 'form-control', 'row' => 3]) !!}
            </div>
            <div class="col-auto">
                {!! Form::label('image', 'รูปสินค้า', ['for' => 'forFileSm']) !!}
                {!! Form::file('image', null, ['class' => 'form-control', 'id' => 'forFileSm']) !!}
            </div><br>
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection