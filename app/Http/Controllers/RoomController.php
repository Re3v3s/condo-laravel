<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\MeterLogs;
use App\Models\Customers;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $FirstJoin = Rooms::select('rooms.id','rooms.name','rooms.floor','rooms.customer_id','customers.firstname')
            ->leftjoin('customers','customers.id','=','rooms.customer_id')
            // ->leftjoin('rooms','rooms.customer_id','=','customers','customers.id')
            ->where('rooms.id','>',0)
            ->paginate(5);
        // $data = Rooms::where('id','>',0)->paginate(5);
        return view('condo.Rooms.index',compact('FirstJoin'));

        // return dd($FirstJoin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //สร้างมิเตอร์น้ำ แล้วเอา ID ไปใส่ใน ROOMS
            $room = "ห้อง".$request->name;
          $MeterLogs =  MeterLogs::create([
               'description' => $room,
               'meter_current' => 0
               ]);
            $lastInsert = $MeterLogs->id;

            Rooms::create([
                'name' => $request->name,
                'floor' => $request->floor,
                'water_price' => $request->water_price,
                'building_id' => $request->building_id,
                'meter_log_id' => $lastInsert
            ]);


       return redirect('rooms');

        // return dd($lastInsert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
