@extends('layouts.frontend')
@section('content')
    <div class="row py-4">
        <div class="col-lg margin-tb">
            <div class="pull-left">
                <h2>จัดการบทบาทหน้าที่</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a href="{{ route('roles.create') }}" class="btn btn-success">สร้างบทบาทใหม่</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ลำดับ</th>
            <th>รายการ</th>
            <th width="280px">จัดการ</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">ดู</a>
                    @can('role-edit')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">แก้ไข</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('ลบ', [
                            'class' => 'btn btn-danger btn-sm',
                            'onclick' => "return confirm ('ยืนยันการลบหรือไม่')",
                        ]) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->links() !!}
@endsection
