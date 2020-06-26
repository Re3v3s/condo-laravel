@extends('adminlte.dashboard')
@section('title','Contact Page')

@section('content')

{{-- {{dd($cus)}} --}}


<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center">ทำสัญญา</h3>
        </div>
        <div class="card-body">
        <form action="{{ url('contacts')}}" method="POST">
            @csrf

            <div class="row">
                <button class="btn btn-primary float-left mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลลูกค้าใหม่</button> <br>
             </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend ">
                            <span class="input-group-text" id="basic-addon1">
                                {{-- text --}} ลูกค้า
                            </span>
                        </div>
                            {{-- <input type="text" class="form-control col-md" name="customer_id" placeholder="" aria-label="" aria-describedby="basic-addon1" required> --}}
                            <select class="custom-select col-md" name="customer_id" id="cusid">
                                @foreach ($cus as $item)
                            <option  style="width: 100%;" value="{{$item->id}}">{{ $item->firstname}}</option>
                                @endforeach
                            </select>

                            <div class="input-group-prepend ml-3 ">
                            <span class="input-group-text" id="basic-addon1">
                                {{-- text --}} ห้อง
                            </span>
                        </div>
                            {{-- <input type="text" class="form-control col-md"  name="room_id" placeholder="" aria-label="" aria-describedby="basic-addon1" required> --}}
                            <select class="custom-select col-md" name="room_id" id="room_id">
                                @foreach ($rooms as $item)
                            <option   value="{{$item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>

                            <div class="input-group-prepend ml-3 ">
                            <span class="input-group-text" id="basic-addon1">
                                {{-- text --}} ตึก
                            </span>
                        </div>
                            {{-- <input type="text" class="form-control col-md"  name="building_id" placeholder="" aria-label="" aria-describedby="basic-addon1" required> --}}
                            <select class="custom-select col-md" name="building_id" id="building_id">
                                @foreach ($bd as $item)
                            <option   value="{{$item->id}}">{{ $item->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                เลขที่สัญญา
                            </span>
                        </div>
                    <input type="number" class="form-control" name="contact_no" value="{{$NewCno}}" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" readonly>

                            <div class="input-group-prepend ml-3">
                            <span class="input-group-text" id="basic-addon1">
                                วันที่เริ่มต้นทำสัญญา
                            </span>
                        </div>
                    <input type="date" class="form-control" name="create_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required>

                            <div class="input-group-prepend ml-3">
                                <span class="input-group-text" id="basic-addon1">
                                    วันที่หมดสัญญา
                                </span>
                        </div>
                                <input type="date" class="form-control" name="end_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>

                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend ">
                            <span class="input-group-text" id="basic-addon1">
                                {{-- text --}} ราคาห้อง
                            </span>
                        </div>
                             <input type="number" class="form-control col-md" name="price" placeholder="" aria-label="" aria-describedby="basic-addon1" required>

                             <div class="input-group-prepend ml-3 ">
                            <span class="input-group-text" id="basic-addon1">
                                {{-- text --}} เงินมัดจำ
                            </span>
                        </div>
                            <input type="number" class="form-control col-md"  name="earnest" placeholder="" aria-label="" aria-describedby="basic-addon1" required>

                            <div class="input-group-prepend ml-3 ">
                            <span class="input-group-text" id="basic-addon1">
                                 {{-- text --}} ประเภท
                            </span>
                        </div>
                            {{-- <input type="text" class="form-control col-md"  name="type_id" placeholder="" aria-label="" aria-describedby="basic-addon1" required> --}}
                            <select class="custom-select col-md" name="type_id" id="type_id">
                                @foreach ($Cct as $item)
                            <option   value="{{$item->id}}">{{ $item->description}}</option>
                                @endforeach
                            </select>

                            <input type="hidden" name="user_id" value="1">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="confirm_at" value="{{$Cf}}">
                    </div>
                </div>
                    <div>
                        <button class="btn btn-primary float-right" onclick="return confimr('ตรวจข้อมูลเรียบร้อย ตกลงทำสัญญาใช่หรือไม่ ?')">ตกลง</button>
                    </div>
            </form>


        </div>
    </div>
</div>


{{-- สร้างข้อมูลลูกค้า --}}
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


            <form action="{{ url('/contacts')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <input type="hidden" value="from_contact" name="from_contact">
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
