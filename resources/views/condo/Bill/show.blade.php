@extends('adminlte.dashboard')
@section('title','Show Bill')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                    <h1 class="text-center">รายละเอียดบิล</h1>
            </div>
            <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                            <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ค่าบริการ</th>
                                        <th>หน่วย</th>
                                        <th>ราคาหน่วยละ</th>
                                        <th>ราคารวม</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($oddatas as $data)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{$data->sv_name}}</td>
                                        <td>{{$data->amount}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>{{$data->total}}</td>
                                        @php
                                                $sum[] = $data->total
                                        @endphp

                                    </tr>
                                @endforeach
                            @if (isset($water[0]))
                                @foreach ($water as $item)
                                    <tr>
                                        <td>{{$num++}}</td>
                                        <td>{{'ค่าน้ำ'}}</td>
                                        <td>{{$result}}</td>
                                        <td>{{12}}</td>
                                        <td>{{$last_result}}</td>
                                        @php
                                                $sum[] = $last_result
                                        @endphp

                                    </tr>
                                @endforeach
                            @endif

                                    @php
                                            $plus_sum = array_sum($sum)
                                    @endphp
                                <tr class="bg-dark text-white">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>รวม</td>
                                    <td>{{ number_format($plus_sum)}} {{'บาท'}}</td>
                                </tr>
                            </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
