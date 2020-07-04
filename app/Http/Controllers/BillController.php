<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Services;
use App\Models\MeterLogDetails;
use App\Models\Rooms;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        return view('condo.Bill.index');
    }


    public function billsent(Request $request)
    {
            if(isset($request)){
               $month = $request->month;
               $year = $request->year;
            }
            $num = 1 ;
            $datas = Orders::select('orders.id as od_id','rooms.name as r_name')
                ->leftjoin('rooms','rooms.id','=','orders.room_id')
                ->where('orders.month','=',$month)
                ->where('orders.year','=',$year)
                ->orderby('rooms.name','asc')
                ->get();

            //  return dd($datas);
            return view('condo.Bill.index',compact('datas','month','year','num'));

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
        // return dd($id);
        $num = 1;
        // order
        $oddatas = Orders::select('orders.id as od_id','order_details.amount','order_details.price','order_details.total','services.name as sv_name')
                            ->leftjoin('order_details','order_details.order_id','=','orders.id')
                            ->leftjoin('services','services.id','=','order_details.service_id')
                            ->leftjoin('rooms','rooms.id','=','orders.room_id')
                            ->where('orders.id','=',$id)
                            ->get();
        // water
        $water = MeterLogDetails::select('meter_log_details.old_number as old_num','meter_log_details.new_number as new_num','meter_log_details.price_water as price_w')
                                    ->leftjoin('orders','orders.meter_log_id','=','meter_log_details.meter_log_id')
                                    ->where('orders.id','=',$id)
                                    ->get();
            if(count($water) > 0){
                $oldnum = $water[0]->old_num;
                $newnum = $water[0]->new_num;
                $result = (int)$newnum - (int)$oldnum;
                $last_result = $result * 12;
                return view('condo.Bill.show',compact('oddatas','num','result','last_result','water'));
            }else{
                return view('condo.Bill.show',compact('oddatas','num'));
            }

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
