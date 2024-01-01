@extends('layouts.frontend')
@section('title', 'บทความ')
@section('css_before')

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-12 mx-auto">
                <br>
                <div class="float-end">
                    @if (request()->has('trashed'))
                        <a href="{{ route('posts.index') }}" class="btn btn-info">ดูบทความทั้งหมด</a>
                        <a href="{{ route('posts.restoreAll') }}" class="btn btn-success">กู้คืนทั้งหมด</a>
                    @else
                        <a href="{{ route('posts.index', ['trashed' => 'post']) }}" class="btn btn-danger">บทความที่ถูกลบ</a>
                    @endif
                </div>
                @if ($posts)
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
                                        @if (!request()->has('trashed'))
                                            <a href="{{ route('show', $post->id) }}"
                                                class="btn btn-info btn-sm">ดูรายละเอียด</a>
                                            <a href="{{ route('edit', $post->id) ?? '' }}"
                                                class="btn btn-warning btn-sm">แก้ไขข้อมูล</a>
                                            {{-- <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('ยืนยันการลบหรือไม่')">ลบข้อมูล</a> --}}|
                                        @endif

                                        @if (request()->has('trashed'))
                                            <a href="{{ route('posts.restore', $post->id) }}"
                                                class="btn btn-success btn-sm">กู้คืน</a>
                                        @else
                                            <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ</a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{ $posts->links() }}
                    {{-- {{ $page->linke() }} --}}
                @else
                    <span class="text-danger">ไม่มีข้อมูล</span>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js_before')

@endsection
