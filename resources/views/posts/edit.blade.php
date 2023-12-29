@extends('layouts.frontend')
@section('title', 'เพิ่มรายการใหม่')
@section('content')
    <div class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col 8 mx-auto">
                <form action="{{ route('update', $posts->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">แก้ไขหัวข้อ</label>
                        <input type="text" name="post_title" class="form-control" value="{{ $posts->post_title }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">แก้ไขรายละเอียด</label>
                        <textarea name="post_detail" cols="30" rows="10" class="form-control">{{ $posts->post_detail }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
