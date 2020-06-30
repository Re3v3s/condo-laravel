@extends('adminlte.dashboard')
@section('title' , 'Add Payment')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center mt-2"> เพิ่มค่าบริการ </h3>
        </div>

        <div class="card-body">

        <form action="{{url('payment-sent')}}" method="GET">
            {{-- @method('GET') --}}
            {{-- @csrf --}}
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
                    <option value="{{$data->id}}" @if(isset($room_id) && $room_id == $data->id) {{"selected"}} @endif>{{$data->name}}</option>
                        @endforeach
                    </select>

                        <div class="input-group-prepend ml-3">
                        <span class="input-group-text" id="basic-addon1">
                            เดือน
                        </span>
                    </div>
                {{-- <input type="date" class="form-control" name="create_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required> --}}
                        <select class="custom-select col-md" name="month" id="">
                            <option value="January" @if(isset($month) && $month == 'January') {{"selected"}} @endif>มกราคม</option>
                            <option value="Febuary" @if(isset($month) && $month == 'Febuary') {{"selected"}} @endif>กุมภาพันธ์</option>
                            <option value="March" @if(isset($month) && $month == 'March') {{"selected"}} @endif>มีนาคม</option>
                            <option value="April" @if(isset($month) && $month == 'April') {{"selected"}} @endif>เมษายน</option>
                            <option value="May" @if(isset($month) && $month == 'May') {{"selected"}} @endif>พฤษภาคม</option>
                            <option value="June" @if(isset($month) && $month == 'June') {{"selected"}} @endif>มิถุนายน</option>
                            <option value="July" @if(isset($month) && $month == 'July') {{"selected"}} @endif>กรฏาคม</option>
                            <option value="August" @if(isset($month) && $month == 'August') {{"selected"}} @endif>สิงหาคม</option>
                            <option value="September" @if(isset($month) && $month == 'September') {{"selected"}} @endif>กันยายน</option>
                            <option value="October" @if(isset($month) && $month == 'October') {{"selected"}} @endif>ตุลาคม</option>
                            <option value="November" @if(isset($month) && $month == 'November') {{"selected"}} @endif>พฤศจิกายน</option>
                            <option value="December" @if(isset($month) && $month == 'December') {{"selected"}} @endif>ธันวาคม</option>
                        </select>

                        <div class="input-group-prepend ml-3">
                            <span class="input-group-text" id="basic-addon1">
                               ปี
                            </span>
                    </div>
                            {{-- <input type="date" class="form-control" name="end_date" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required> --}}
                            <select class="custom-select col-md" name="year" id="">
                                <option value="2020" @if(isset($year) && $year == 2020) {{"selected"}} @endif>2020</option>
                                <option value="2021" @if(isset($year) && $year == 2021) {{"selected"}} @endif>2021</option>
                                <option value="2022" @if(isset($year) && $year == 2022) {{"selected"}} @endif>2022</option>
                                <option value="2023" @if(isset($year) && $year == 2023) {{"selected"}} @endif>2023</option>
                                <option value="2024" @if(isset($year) && $year == 2024) {{"selected"}} @endif>2024</option>
                                <option value="2025" @if(isset($year) && $year == 2025) {{"selected"}} @endif>2025</option>
                            </select>
                </div>
            </div>

            <div class="row float-right">
                <button class="btn btn-primary" name="deal">ตกลง</button>
            </div>
        </form>

        </div>
    </div>

    {{-- after sent request --}}
    <div class="card">
        <div class="container">


        @if (isset($Ods))
            {{-- Check data Empty Or not --}}
            @if(!$Ods->isEmpty())
                 {{-- $data is not empty --}}
                 <div class="float-right mb-4 mt-2">
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#mymodal">เพิ่มค่าบริการ</button>
                </div>
                    <table class="table table-hover table-bordered text-center">
                            <thead class="text-white bg-dark mt-5">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>งานบริการ</th>
                                    <th>ราคาต่อหน่วย</th>
                                    <th>จำนวน</th>
                                    <th>ราคารวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Ods as $Od)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{$Od->name}}</td>
                                        <td>{{number_format($Od->price,2)}}</td>
                                        <td>{{$Od->amount}}</td>
                                        <td>{{number_format(($Od->price * $Od->amount),2)}}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                    </table>
            @else
                 {{-- $data is empty --}}
                 <div class="float-right mb-4 mt-2">
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#mymodal">เพิ่มค่าบริการ</button>
                </div>
                 <table class="table table-hover table-bordered text-center">
                    <thead class="text-white bg-dark mt-5">
                        <tr>
                            <th>ลำดับ</th>
                            <th>งานบริการ</th>
                            <th>ราคาต่อหน่วย</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>ไม่มีรายการ</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                 </table>
            @endif
        @endif
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


            <form action="{{ url('/payment')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            งานบริการ
                        </span>
                        </div>
                        {{-- <input type="text" class="form-control" name="" placeholder="" aria-label="" aria-describedby="basic-addon1" required> --}}
                        <select class="custom-select" name="service_id" id="">
                            @foreach ($Svs as $Sv)
                                <option value="{{$Sv->id}}">{{$Sv->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                หน่วย
                            </span>
                        </div>
                        <input type="number" class="form-control" name="amount" placeholder="" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ราคา
                            </span>
                        </div>
                        <input type="number" class="form-control" name="price" placeholder="" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
            <input type="hidden" name="order_id" value="{{isset($Od->od_id) ? $Od->od_id : ''}}">



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
