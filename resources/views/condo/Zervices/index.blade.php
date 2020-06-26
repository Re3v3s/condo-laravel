@extends('adminlte.dashboard')

@section('title' , 'Welcome to service Page')

@section('content')

<div class="container">
    {{-- <h1 class="text-center">Hello this is Service Page</h1> --}}

    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            <h3 class="text-center">งานบริการ</h3>
        </div>
        <div class="card-body">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
            <table class="table table-hover table-bordered ">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อบริการ</th>
                        <th>หน่วยนับ</th>
                    </tr>
                </thead>

                @foreach ($data as $item)
                    <tr>
                    <th>{{$item->id}}</th>
                        <th>{{$item->name}}</th>
                        <th>{{$item->unit}}</th>
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


            <form action="{{ url('/services')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            ชื่อบริการ
                        </span>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="ชื่อบริการ" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            หน่วยนับ
                        </span>
                        </div>
                        <input type="text" class="form-control" name="unit" placeholder="หน่วยนับ" aria-label="Username" aria-describedby="basic-addon1">
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
