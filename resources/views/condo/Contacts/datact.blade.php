@extends('adminlte.dashboard')
@section('title', 'Data of Contact')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center"> ข้อมูลสัญญา </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
            {{-- <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button> --}}
                <thead class="bg-dark text-white">
                    <tr>
                        <th>เลขสัญญา</th>
                        <th>เลขห้อง</th>
                        <th>สัญญาของคุณ</th>
                        <th>ดูรายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)

                    <tr>
                        <td>{{ $data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->firstname }}</td>
                    <td>
                        <form action="{{url('datact/'.$data->id)}}">
                            @method('POST')
                            @csrf
                                <button class="btn btn-warning">แสดงข้อมูล</button>
                    </td>
                        </form>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
