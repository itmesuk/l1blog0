@extends('layouts.frontend')
@section('title', 'หน้าแรกบทความ')
@section('css_before')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <br>
                @if ($posts)
                    <div class="float-end">
                        @auth
                            @if (Auth::user()->role === 1)
                                @if (request()->has('trashed'))
                                    <a href="{{ route('posts.index') }}" class="btn btn-info">ดูบทความทั้งหมด</a>
                                    <a href="{{ route('posts.restoreAll') }}" class="btn btn-success">กู้คืนทั้งหมด</a>
                                @else
                                    <a href="{{ route('create', ['trashed' => 'post']) }}"
                                        class="btn btn-primary">เพิ่มบทความใหม่</a>
                                    <a href="{{ route('posts.index', ['trashed' => 'post']) }}"
                                        class="btn btn-danger">บทความที่ถูกลบ</a>
                                @endif
                            @elseif(Auth::user()->role === 2)
                                @if (request()->has('trashed'))
                                    <a href="{{ route('posts.index') }}" class="btn btn-info">ดูบทความทั้งหมด</a>
                                @else
                                    <a href="{{ route('create', ['trashed' => 'post']) }}"
                                        class="btn btn-primary">เพิ่มบทความใหม่</a>
                                    <a href="{{ route('posts.index', ['trashed' => 'post']) }}"
                                        class="btn btn-danger">บทความที่ถูกลบ</a>
                                @endif
                            @endif
                        @endauth
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">หัวข้อ</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="col">{{ $post->id }}</th>
                                    <td scope="col">{{ $post->post_title }}</td>
                                    <td scope="col" style="width: 50%">{{ Str::limit($post->post_detail, 100) }}</td>
                                    <td scope="col">
                                        {{-- @if (!request()->has('trashed')) --}}
                                        <a href="{{ route('show', $post->id) }}" class="btn btn-info btn-sm">ดู</a>
                                        @auth
                                            @if (Auth::user()->role === 1)
                                                <a href="{{ route('edit', $post->id) ?? '' }}"
                                                    class="btn btn-warning btn-sm">แก้ไข</a>
                                                @if (request()->has('trashed'))
                                                    <a href="{{ route('posts.restore', $post->id) }}"
                                                        class="btn btn-success">กู้คืน</a>
                                                @else
                                                    <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ</a>
                                                @endif
                                            @elseif(Auth::user()->role === 2)
                                                <a href="{{ route('edit', $post->id) ?? '' }}"
                                                    class="btn btn-warning btn-sm">แก้ไข</a>
                                                <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ</a>
                                            @endif
                                        @endauth
                                        {{-- <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('ยืนยันการลบหรือไม่')">ลบข้อมูล</a> --}}
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                @else
                    <span class="text-danger">ไม่มีข้อมูล</span>
                @endif
            </div>
        </div>
    @endsection

    @section('js_before')

    @endsection
