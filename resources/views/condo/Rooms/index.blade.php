@extends('adminlte.dashboard')

@section('title','Rooms Pages')


@section('content')



<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        <h3 class="text-center">ข้อมูลห้องพัก</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ห้อง</th>
                        <th>ชั้น</th>
                        <th>ผู้พักอาศัย</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($FirstJoin as $item)


                    <tr>

                    <td>{{$item->name}}</td>
                    <td>{{$item->floor}}</td>
                        @if($item->customer_id <> 0)
                            <td><button class="btn btn-warning">{{$item->firstname}}</button></td>
                        @else
                            <td><button class="btn btn-primary">ไม่มีผู้เช่า</button></td>
                        @endif

                    </tr>


                    @endforeach
                </tbody>
            </table>

            <div class="mt-2 float-right" >
                {{ $FirstJoin->links()}}
            </div>

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


            <form action="{{ url('/rooms')}}" method="POST">
                {{-- @method('POST') --}}
                @csrf
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                เลขห้อง
                            </span>
                        </div>
                        <input type="number" class="form-control" name="name" placeholder="เลขห้อง" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ชั้น
                            </span>
                        </div>
                        <input type="number" class="form-control" name="floor" placeholder="ชั้น" aria-label="" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ราคาค่าน้ำ
                            </span>
                        </div>
                        <input type="number" class="form-control" name="water_price" value="12" placeholder="ราคาค่าน้ำ" aria-label="" aria-describedby="basic-addon1" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mt-3 mb-3 text-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                ตึก
                            </span>
                        </div>
                        <input type="number" class="form-control" name="building_id" placeholder="ตึก"  value="1" aria-label="" aria-describedby="basic-addon1" required>
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
