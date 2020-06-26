@extends('adminlte.dashboard')

@section('title' , 'ข้อมูลตึก')


@section('content')

{{-- <h1 class="text-center"> ข้อมูลตึก </h1> --}}
<div class="container">
    {{-- <h1 class="text-center">Hello this is Service Page</h1> --}}

    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            <h3 class="text-center">งานบริการ  </h3>
        </div>
        <div class="card-body">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อตึก</th>
                        <th>detail</th>
                        <th>อำเภอ</th>
                        <th>ตำบล</th>
                        <th>จังหวัด</th>
                        <th>phone</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>

                @foreach ($data as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->detail}}</td>
                        <td>{{$item->amphur}}</td>
                        <td>{{$item->district}}</td>
                        <td>{{$item->province}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                        <a href="{{url('buildings/'.$item->id.'/edit')}}">
                            <button class="btn btn-warning">แก้ไข</button>
                        </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
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


            <form action="{{ url('/buildings')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            ชื่อตึก
                        </span>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="ชื่อตึก" aria-label="name" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                รายละเอียด
                            </span>
                        </div>
                        <input type="text" class="form-control" name="detail" placeholder="หน่วยนับ" aria-label="detail" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ที่อยู่
                            </span>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="ที่อยู่" aria-label="address" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                อำเภอ
                            </span>
                        </div>
                        <input type="text" class="form-control" name="amphur" placeholder="อำเภอ" aria-label="amphur" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                เมือง
                            </span>
                        </div>
                        <input type="text" class="form-control" name="district" placeholder="เมือง" aria-label="district" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                จังหวัด
                            </span>
                        </div>
                        <input type="text" class="form-control" name="province" placeholder="จังหวัด" aria-label="province" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                รหัสไปรษณีย์
                            </span>
                        </div>
                        <input type="number" class="form-control" name="postcode" placeholder="รหัสไปรษณีย์" aria-label="postcode" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                เบอร์โทรศัพท์
                            </span>
                        </div>
                        <input type="number" class="form-control" name="phone" placeholder="เบอร์โทรศัพท์" aria-label="phone" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                นิติบุคคลที่ดูแล
                            </span>
                        </div>
                        <select name="juristic_id" id="juristic_id">
                        <option value="{{$jur[0]->id}}" name="juristic_id"> {{$jur[0]->name}} {{$jur[0]->lastname}}</option>
                        </select>
                    </div>
                </div>


                    {{-- {{$jur[0]->id}} --}}
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
