@extends('adminlte.dashboard')

@section('title', 'Edit User')


@section('content')
<style>
    input {display: block; padding: 0; margin: 0; width: 100%;}
    td {margin: 0; padding: 0;}
</style>

<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

            <h3 class="text-center"> ข้อมูลผู้ใช้งาน </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th> ลำดับ </th>
                        <th> ชื่อ </th>
                        <th> รายละเอียด </th>
                        <th> ที่อยู่ </th>
                        <th> อำเภอ </th>
                        <th> ตำบล </th>
                        <th> จังหวัด </th>
                        <th> รหัสไปรษณีย์ </th>
                        <th> เบอร์โทรศัพท์ </th>
                    </tr>
                </thead>
                <tbody>

                <form action="{{ url('buildings',[$data->id])}}" method="POST">
                    @method('PUT')
                    @csrf

                    {{-- @foreach ($data as $item) --}}
                    {{-- <div class="container"> --}}
                    <tr>
                    {{-- <td></td> --}}
                        <td>
                            <input type="text" name="id" value="{{$data->id}}" disabled>
                        </td>
                        <td>
                            <input type="text" name="name" value="{{$data->name}}" required>
                        </td>
                        <td>
                            <input type="text" name="detail" value="{{$data->detail}}" required>
                        </td>
                        <td>
                            <input type="text" name="address" value="{{$data->address}}" required>
                        </td>
                        <td>
                            <input type="text" name="amphur" value="{{$data->amphur}}" required>
                        </td>
                        <td>
                            <input type="text" name="district" value="{{$data->district}}" required>
                        </td>
                        <td>
                            <input type="text" name="province" value="{{$data->province}}" required>
                        </td>
                        <td>
                            <input type="number" name="postcode" value="{{$data->postcode}}" required>
                        </td>
                        <td>
                            <input type="number" name="phone" value="{{$data->phone}}" required>
                        </td>

                    </tr>
                    {{-- </div> --}}

                    {{-- @endforeach --}}
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-2 float-right" onclick="return confirm('คุณยืนยันการแก้ไขข้อมูลนะ ?')">ตกลง</button>
        </form>

        </div>
    </div>
</div>

@endsection
