@extends('adminlte.dashboard')

@section('title', 'Edit User')


@section('content')

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
                        <th> นามสกุล </th>
                        <th> Email </th>
                        <th> สถานะ </th>
                    </tr>
                </thead>
                <tbody>

                <form action="{{ url('users',[$data->id])}}" method="POST">
                    @method('PUT')
                    @csrf

                    {{-- @foreach ($data as $item) --}}

                    <tr>
                    {{-- <td></td> --}}
                    <td>
                        <input type="text" name="id" value="{{$data->id}}" disabled>
                    </td>
                    <td>
                        <input type="text" name="name" value="{{$data->name}}" required>
                    </td>
                    <td>
                        <input type="text" name="lastname" value="{{$data->lastname}}" required>
                    </td>
                    <td>
                        <input type="text" name="email" value="{{$data->email}}" required>
                    </td>
                    <td>
                        <select name="level" id="level">
                            <option value="" name="level">โปรดระบุสถานะ</option>
                            <option value="Admin" name="level">Admin</option>
                            <option value="Employee" name="level">Employee</option>
                            <option value="User" name="level">User</option>
                        </select>
                    </td>

                    </tr>


                    {{-- @endforeach --}}
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-2 float-right" onclick="return confirm('คุณยืนยันการแก้ไขข้อมูลนะ ?')">ตกลง</button>
        </form>

        </div>
    </div>
</div>

@endsection
