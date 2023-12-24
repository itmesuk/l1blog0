@extends('layouts.frontend')

@section('title', 'บทความ')

@section('css_before')

@endsection

@section('content')
    <div class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                @forelse ($posts as $post)
                    <ul>
                        <li>Title: <b>{{ $post->post_title }}</b> ผู้เขียน : {{ $post->user_id }}<br>
                            Detail: {{ Str::limit($post->post_detail, 50) }} <br>
                            <a href="{{ route('show', $post->id) }}" class="btn btn-info btn-sm">ดูรายละเอียด</a>
                            <a href="{{ route('edit', $post->id) }}" class="btn btn-warning btn-sm">แก้ไข </a>
                            <a href="{{ route('destroy', $post->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('ยืนยันการลบหรือไม่')">ลบข้อมูล</a>
                            <hr>
                        </li>
                    </ul>
                @empty
                    <span class="text-danger">ไม่พบข้อมูล</span>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('js_before')

@endsection
