@extends('layouts.frontend')
<<<<<<< HEAD
@section('title', 'เพิ่มสินค้า')
=======
@section('titile', 'เพิ่มสินค้า')
>>>>>>> 573d081ebfd03645833ad272f04964de6cad2815
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
<<<<<<< HEAD
                {!! Form::textarea('detail', null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
            <div class="col-auto">
                {!! Form::label('image', 'รูปสินค้า', ['for' => 'formFileSm']) !!} <br>
                {!! Form::file('image', null, ['class' => 'form-control', 'id' => 'formFileSm']) !!}
            </div><br>
            <div class="col-auto">
                {!! Form::submit('บันทึกสินค้า', ['class' => 'btn btn-success']) !!}
                {!! link_to('products', $title = 'ยกเลิก', ['class' => 'btn btn-danger'], $secure = null) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
=======
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
>>>>>>> 573d081ebfd03645833ad272f04964de6cad2815
