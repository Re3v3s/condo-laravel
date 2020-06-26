@extends('adminlte.dashboard')
@section('title','Edit Customer')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">
        <h3 class="text-center"> Edit Customer </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>เลขบัตรประชาชน</th>
                    </tr>
                </thead>
                <tbody>
                <form action="{{url('customers',[$data->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <tr>
                        <td>
                        <input type="text" name="firstname" value="{{$data->firstname}}" required>
                        </td>
                        <td>
                        <input type="text" name="lastname" value="{{$data->lastname}}" required>
                        </td>
                        <td>
                        <input type="number" name="phone" value="{{$data->phone}}"
                        onkeypress="if(this.value.length==10) return false" required>
                        </td>
                        <td>
                            <input type="number" name="idcard" value="{{$data->idcard}}"
                            onkeypress="if(this.value.length==13) return false" required>
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
