@extends('layouts.frontend')

@section('title', 'บทความ')

@section('css_before')

@endsection

@section('content')
    <div class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-12 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">หัวข้อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <th scope="col">{{ $post->id }}</th>
                                <td scope="col">{{ $post->post_title }}</td>
                                <td scope="col" style="width: 50%">{{ Str::limit($post->post_detail, 100) }}</td>
                                <td scope="col">
                                    <a href="{{ route('show', $post->id) }}" class="btn btn-info btn-sm">ดูรายละเอียด</a>
                                    <a href="{{ route('edit', $post->id) }}" class="btn btn-warning btn-sm">แก้ไขข้อมูล</a>
                                    <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('ยืนยันการลบหรือไม่')">ลบข้อมูล</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

@section('js_before')

@endsection
