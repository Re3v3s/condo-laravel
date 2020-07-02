<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\MeterLogs;
use App\Models\MeterLogDetails;



class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Rooms::where('rooms.floor','=',1)
                        ->where('rooms.customer_id','>',0)
                        ->get();
        return view('condo.MeterLogDetails.index',compact('datas'));
    }

    public function watercheck (Request $request)
    {
            if(isset($request)){

                $floor = $request->floor;
                $month = date('F');
                $year = date('Y');
                $Rooms = Rooms::select('rooms.id as r_id','rooms.name as r_name','meter_logs.id as ml_id','meter_logs.meter_current as ml_cr','meter_log_details.old_number as mld_old','meter_log_details.new_number as mld_new',)
                                ->leftjoin('meter_logs','meter_logs.id','=','rooms.id')
                                ->leftjoin('meter_log_details','meter_log_details.id','=','meter_logs.id')
                                ->where('rooms.floor','=',$floor)
                                ->where('rooms.customer_id','>',0)
                                ->get();
                // return dd($floor,$month,$year);

                // return dd($Rooms);

                return view('condo.MeterLogDetails.index',compact('Rooms','floor','month','year'));
            }
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
        // return dd($request->all());
        $save_ml = MeterLogDetails::create([
            
        ]);
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
