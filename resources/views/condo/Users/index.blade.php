@extends('adminlte.dashboard')

@section('title , User Page')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

            <h3 class="text-center"> ข้อมูลผู้ใช้งาน </h3>
        </div>
        <div class="card-body">
        <a href="{{url('register')}}">
            <button class="btn btn-primary float-right mb-2">เพิ่มผู้ใช้งาน</button>
        </a>
            <table class="table table-bordered table-hover text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th> ลำดับ </th>
                        <th> ชื่อ </th>
                        <th> นามสกุล </th>
                        <th>Email</th>
                        <th> สถานะ </th>
                        <th> แก้ไข </th>
                        <th> ลบ </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)

                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->lastname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->level}}</td>
                    <td>
                    <a href="{{url('users/'.$item->id.'/edit')}}">
                         <button class="btn btn-warning">Edit</button>
                    </a>
                    </td>
                    <td>
                        <form action="{{url('users',[$item->id])}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"
                        onclick="return confirm('คุณต้องการลบ {{$item->name}} ใช่ไหม ?')">DELETE</button>
                        </form>
                    </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
