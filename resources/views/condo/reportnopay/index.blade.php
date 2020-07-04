@extends('adminlte.dashboard')
@section('title','Report Nopay')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">
                    <h1 class="text-center">รายงานห้องที่ยังไม่ได้ชำระ</h1>
            </div>
            <div class="card-body">
                <form action="{{url('nopay-sent')}}" method="GET">
                    {{-- @method('GET') --}}
                    {{-- @csrf --}}
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
                        </div>
                    </div>

                    <div class="row float-right">
                        <button class="btn btn-primary" name="deal">ตกลง</button>
                    </div>
                </form>

            </div>  {{-- end cardbody --}}
        </div> {{-- end card --}}

        @if (isset($nopays))
            @if (!$nopays->isEmpty())
            {{-- data not empty --}}
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered text-center">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>เลขห้อง</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nopays as $data)
                                        <tr>
                                            <td>{{$num++}}</td>
                                            <td>{{$data->r_name}}</td>
                                            <td>
                                            <button class="btn btn-warning">{{"ยังไม่ชำระ"}}</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
            @else
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>เลขห้อง</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="bg-dark text-white">
                                    <td>  </td>
                                    <td> ไม่มีรายการสำหรับเดือนนี้ </td>
                                    <td>
                                    </td>
                                </tr>

                            </tbody>
                    </table>
                </div>
            </div>
            @endif

        @endif
    </div>
@endsection
