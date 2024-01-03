@extends('layouts.frontend')
@section('content')
    <div class="row py-4">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>สร้างบทบาทใหม่</h2>
            </div>
            <div class="pull-right"><a href="{{ route('roles.index') }}" class="btn btn-primary">กลับ</a></div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>วุ้ววววว</strong> มีบางอย่างผิดพลาด <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อบทบาท</strong>
                {!! Form::text('name', null, ['placholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission</strong>
                <br>
                @foreach ($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }} {{ $value->name }}
                    </label>
                    <br>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
