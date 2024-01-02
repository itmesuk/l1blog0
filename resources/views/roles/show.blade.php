@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>แสดง</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('roles.index') }}" class="btn btn-primary">กลับ</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อบทบาท</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>สิทธิ์การเข้าใช้งาน</strong>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }}</label>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
