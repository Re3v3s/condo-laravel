@extends('adminlte.dashboard')
@section('title','Water Page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center mt-3">ค่าน้ำ</h3>
        </div>
        <div class="card-body">
                {{-- เลือก เดือนและปี --}}
                <form action="{{url('water-check')}}" method="GET">
                    {{-- @method('GET') --}}
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="input-group mt-3 mb-3 text-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    เลือกชั้น
                                </span>
                            </div>
                        {{-- <input type="number" class="form-control" name="contact_no" value="{{$NewCno}}" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" readonly> --}}
                            <select name="floor" class="custom-select col-md" id="room">
                                {{-- @foreach ($datas as $data)
                            <option value="{{$data->floor}}" @if(isset($room_id) && $room_id == $data->id) {{"selected"}} @endif>{{$data->floor}}</option>
                                @endforeach --}}
                                <option value="1" @if(isset($floor) && $floor == '1') {{"selected"}} @endif>ชั้น 1</option>
                                <option value="2" @if(isset($floor) && $floor == '2') {{"selected"}} @endif>ชั้น 2</option>
                                <option value="3" @if(isset($floor) && $floor == '3') {{"selected"}} @endif>ชั้น 3</option>
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
    @if (isset($Rooms))
            <div class="card">
                <div class="card-body">

                <form action="{{ url('/water')}}" method="POST">
                        {{-- @method('POST') --}}
                        @csrf
                    <div class="row">
                        <div class="input-group mt-3 mb-3 text-center">
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

                                    <div class="input-group-prepend ml-3">
                                        <span class="input-group-text" id="basic-addon1">
                                           เลือกวันที่ทำการจดบันทึก
                                        </span>
                                    </div>
                                        <input type="date" class="form-control" name="date_check" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" required>


                        </div>
                    </div>

                    @foreach ($Rooms as $Room)


                    <div class="row">
                        <div class="input-group mt-3 mb-3 text-center">
                            <div class="input-group-prepend ml-3">
                            <span class="input-group-text" id="basic-addon1">
                                ห้อง
                            </span>
                        </div>
                    <input type="number" class="form-control" name="room[]" value="{{$Room->r_name}}" placeholder="ชื่อ" aria-label="" aria-describedby="basic-addon1" readonly>
                    <input type="hidden"  name="meter_log_id[]" value="{{$Room->ml_id}}">

                            <div class="input-group-prepend ml-3">
                                <span class="input-group-text" id="basic-addon1">
                                   ค่าน้ำเก่า
                                </span>
                            </div>
                        <input type="number" class="form-control" name="old_number[]" value="{{$Room->ml_cr}}"  aria-label="" aria-describedby="basic-addon1" readonly>


                            <div class="input-group-prepend ml-3">
                                <span class="input-group-text" id="basic-addon1">
                                   ค่าน้ำปัจจุบัน
                                </span>
                            </div>
                                <input type="number" class="form-control" name="new_number[]"  aria-label="" aria-describedby="basic-addon1" required>
                        </div>

                    </div>
                    @endforeach

                    <div class="row float-right">
                        <button class="btn btn-primary">ตกลง</button>
                    </div>

                </form>
                </div>
            </div>
    @endif
</div>


@endsection
