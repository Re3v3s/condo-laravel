<div class="container">
    <div class="card">
        <div class="card-hearder bg-dark text-white">

        {{-- <h3 class="text-center"></h3> --}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
            <button class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#mymodal">สร้างข้อมูลโดยใช้ Modal</button>
                <thead class="bg-dark text-white">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
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
