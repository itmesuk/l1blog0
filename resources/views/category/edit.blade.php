@extends('layouts.frontend')
@section('title', 'เพิ่มรายการประเภทบนความใหม่')
@section('content')
    <div class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">แก้ไขชื่อประเภท</label>
                        <input type="text" name="category_name" class="form-control"
                            value="{{ $category->category_name }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
