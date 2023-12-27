@extends('layouts.frontend')
@section('titile', 'รายการสินค้าทั้งหมด')
@section('content')
    <section class="py-5 container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ภาพสินค้า</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                        <tbody>
                            <tr>
                                <td scope="col">{{ $product->id }}</td>
                                <td scope="col"><img src="{{ asset($product->image) }}" style="width:50px" /></td>
                                <td scope="col">{{ $product->name }}</td>
                                <td scope="col" style="width:50%">{{ $product->price }}</td>
                                {{-- <td scope="col">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-warning btn-sm">แก้ไข</a>
                                    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('ยืนยันการลบหรือไม่')">ลบ</a>
                                </td> --}}
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
