@extends('adminlte.dashboard')
@section('title','')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">
        {{-- <h3 class="text-center"></h3> --}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
                <thead class="bg-dark text-white">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <form action="{{url('',[$data->id])}}" method="POST">
                    @method('PUT')
                    {{-- put patch 4 update --}}
                    @csrf
                    <tr>
                        <td>
                            <input type="text">
                        </td>
                        <td>
                            <input type="text">
                        </td>
                        <td>
                            <input type="text">
                        </td>
                        <td>
                            <input type="text">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-2 float-right" onclick="return confirm('คุณยืนยันการแก้ไขข้อมูลนะ ?')">ตกลง</button>
        </form>
        </div>
    </div>
</div>
@endsection
