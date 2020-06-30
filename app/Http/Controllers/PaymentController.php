<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\OrderDetails;
use App\Models\Services;
use Symfony\Component\Console\Input\Input;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Rooms::where('customer_id','!=',0)->get();


        $Svs = Services::all();
        return view('condo.Payment.index',compact('datas','Svs'));
    }

    public function payment(Request $request)
    {
        if(isset($request->room)){
            $room_id = $request->room ;
            $month = $request->month ;
            $year = $request->year ;
        }

        $datas = Rooms::where('customer_id','!=',0)->get();
        $Svs = Services::all();
        $Ods = OrderDetails::select('order_details.id','order_details.amount','order_details.price','services.name','orders.month','orders.year','orders.id as od_id')
            ->leftjoin('services','services.id','=','order_details.service_id')
            ->leftjoin('orders','orders.id','=','order_details.order_id')
            ->where('orders.room_id','=',$room_id)
            ->where('orders.month','=',$month)
            ->where('orders.year','=',$year)
            ->get();
        // return dd($Ods);
        $num = 1;

        return view('condo.Payment.index',compact('Ods','datas','room_id','month','year','num','Svs'));
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
        $total = ($request->amount * $request->price);
        $Coder_details = OrderDetails::create([
                'amount' => $request->amount,
                'price' => $request->price,
                'total' => $total,
                'service_id' => $request->service_id,
                'order_id' => $request->order_id
        ]);
        // return dd($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $room_id = $request->room ;
        $month = $request->month ;
        $year = $request->year ;

        return dd($room_id , $month , $year);
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
