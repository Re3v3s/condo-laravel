@extends('adminlte.dashboard')
@section('title' , 'Add Payment')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center"> เพิ่มค่าบริการ </h3>
        </div>

        <div class="card-body">

        <form action="">
            <div class="row">
                <div class="input-group mt-3 mb-3 text-center">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            เลือกห้อง
                        </span>
                    </div>
                {{-- <input type="number" class="form-control" name="contact_no" value="{{$NewCno}}" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" readonly> --}}
                    <select name="room" class="custom-select col-md" id="room">
                        @foreach ($datas as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>

                        <div class="input-group-prepend ml-3">
                        <span class="input-group-text" id="basic-addon1">
                            เดือน
                        </span>
                    </div>
                {{-- <input type="date" class="form-control" name="create_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required> --}}
                        <select class="custom-select col-md" name="month" id="">
                            <option value="January">มกราคม</option>
                            <option value="Febuary">กุมภาพันธ์</option>
                            <option value="March">มีนาคม</option>
                            <option value="April">เมษายน</option>
                            <option value="May">พฤษภาคม</option>
                            <option value="June">มิถุนายน</option>
                            <option value="July">กรฏาคม</option>
                            <option value="August">สิงหาคม</option>
                            <option value="September">กันยายน</option>
                            <option value="October">ตุลาคม</option>
                            <option value="November">พฤศจิกายน</option>
                            <option value="December">ธันวาคม</option>
                        </select>

                        <div class="input-group-prepend ml-3">
                            <span class="input-group-text" id="basic-addon1">
                               ปี
                            </span>
                    </div>
                            {{-- <input type="date" class="form-control" name="end_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required> --}}
                            <select class="custom-select col-md" name="year" id="">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                </div>
            </div>

            <div class="row float-right">
                <button class="btn btn-primary" name="deal">ตกลง</button>
            </div>
        </form>

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


            <form action="{{ url('/')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            {{-- text --}}
                        </span>
                        </div>
                        <input type="text" class="form-control" name="" placeholder="" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                {{-- text --}}
                            </span>
                        </div>
                        <input type="text" class="form-control" name="" placeholder="" aria-label="" aria-describedby="basic-addon1" required>
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
