@extends('layouts.frontend')
@section('content')
    <div class="row py-4">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>เพิ่มสมาชิกใหม่</h2>
            </div>
            <div class="pull-right"><a href="{{ route('users.index') }}" class="btn btn-primary">กลับ</a></div>
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
    </div>
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>ชื่อ: </strong></div>
            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>อีเมล: </strong>
                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sx-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>รหัสผ่าน: </strong>
                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sx-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>ยืนยันรหัสผ่าน: </strong>
                {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sx-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>เลือกบทบาท</strong>
                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
            </div>
        </div>
        <div class="col-sx-12 col-sm-12 col-md-12 text-center">
            <button stype="submit" class="btn btn-primary">บันทึก</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
