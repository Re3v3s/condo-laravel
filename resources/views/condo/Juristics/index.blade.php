@extends('adminlte.dashboard')

@section('title','Juristics ข้อมูลนิติบุคคล')

@section('content')



<div class="container">
            @if ($errors->any())
            <div class="alert alert-danger mt-2 mb-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    <div class="card">
        <div class="card-hearder bg-dark text-white">
                <h3 class="text-center">ข้อมูลนิติบุคคล </h3>
        </div>
        <div class="card-body">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
            <table class="table table-bordered table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>สกุล</th>
                        <th>ที่อยู่</th>
                        <th>วันเกิด</th>
                        <th>บัตรประชาชน</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->birthdate}}</td>
                        <td>{{$item->idcard}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
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


            <form action="{{ url('/juristics')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            ชื่อ
                        </span>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                นามสกุล
                            </span>
                        </div>
                        <input type="text" class="form-control" name="lastname" placeholder="lastname" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ที่อยู่
                            </span>
                        </div>
                        <input type="text" class="form-control" name="address" placeholder="address" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                อำเภอ
                            </span>
                        </div>
                        <input type="text" class="form-control" name="aumphur" placeholder="aumphur" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ตำบล
                            </span>
                        </div>
                        <input type="text" class="form-control" name="district" placeholder="district" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                จังหวัด
                            </span>
                        </div>
                        <input type="text" class="form-control" name="province" placeholder="province" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                รหัสไปรษณีย์
                            </span>
                        </div>
                        <input type="text" class="form-control" name="postcode" minlength="5" onKeyPress="if(this.value.length==5) return false;" placeholder="postcode" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                หมายเลขโทรศัพท์
                            </span>
                        </div>
                        <input type="text" class="form-control" name="phone" minlength="10" onKeyPress="if(this.value.length==10) return false;" placeholder="phone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                วันเกิด
                            </span>
                        </div>
                        <input type="date" class="form-control" name="birthdate" placeholder="birthdate" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                               เลขบัตรประชาชน
                            </span>
                        </div>
                        <input type="number" class="form-control" name="idcard" minlength="13" onKeyPress="if(this.value.length==13) return false;" placeholder="idcard" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

        </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary float-right">บันทึกข้อมูล</button>
            </form>
            </div>
      </div>
    </div>
  </div>

@endsection
