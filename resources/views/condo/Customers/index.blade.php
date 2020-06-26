@extends('adminlte.dashboard')
@section('title','Customers Page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center"> รายชื่อลูกค้า </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>เลขบัตรประาชน</th>
                        <td>แก้ไข</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td> {{$item->id}}</td>
                        <td>{{$item->firstname}}</td>
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->idcard}}</td>
                        <td>
                        <a href="{{url('customers/'.$item->id.'/edit')}}">
                        <button class="btn btn-warning">แก้ไข</button>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 float-right" >
                {{ $data->links()}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title w-100 text-center" id="exampleModalLabel">เพิ่มข้อมูล</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">


            <form action="{{ url('/customers')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            ชื่อ
                        </span>
                        </div>
                        <input type="text" class="form-control" name="firstname" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                               นามสกุล
                            </span>
                        </div>
                        <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ที่อยู่
                            </span>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="ที่อยู่" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                อำเภอ
                            </span>
                        </div>
                        <input type="text" class="form-control" name="aumphur" placeholder="อำเภอ" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                               ตำบล
                            </span>
                        </div>
                        <input type="text" class="form-control" name="district" placeholder="ตำบล" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                จังหวัด
                            </span>
                        </div>
                        <input type="text" class="form-control" name="province" placeholder="จังหวัด" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                รหัสไปรษณีย์
                            </span>
                        </div>
                        <input type="text" class="form-control" name="postcode" placeholder="รหัสไปรษณีย์"
                        aria-label="" aria-describedby="basic-addon1" onkeypress="if(this.value.length==5) return false" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                               เบอร์โทรศัพท์
                            </span>
                        </div>
                        <input type="text" class="form-control" name="phone" placeholder="เบอร์โทรศัพท์"
                        aria-label="" aria-describedby="basic-addon1" onkeypress="if(this.value.length==10) return false" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                วันเดือนปีเกิด
                            </span>
                        </div>
                        <input type="date" class="form-control" name="birthdate" placeholder="วันเดือนปีเกิด" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                เลขบัตรประชาชน
                            </span>
                        </div>
                        <input type="number" class="form-control" name="idcard" placeholder="เลขบัตรประชาชน"
                        aria-label="" aria-describedby="basic-addon1" onkeypress="if(this.value.length==13) return false" required>
                    </div>
                </div>



        </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary float-right">บันทึกข้อมูล</button>
                </div>
            </form>
      </div>
    </div>
  </div>

@endsection
