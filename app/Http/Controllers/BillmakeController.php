<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\OrderDetails;
use App\Models\Orders;

class BillmakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $month = date('F');
        $year = date('Y');
        $nowday = date('y-m-d');
        $num = 1;
        // return dd($nowday);
        $datas = Contacts::select('contacts.price','rooms.id as r_id','rooms.name as r_name','customers.id as c_id','customers.firstname as c_name')
                        ->leftjoin('rooms','rooms.id','=','contacts.room_id')
                        ->leftjoin('customers','customers.id','=','contacts.customer_id')
                        ->get();
        return view('condo.BillMake.index',compact('nowday','datas','year','month','num'));
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
            if(count($request->room_id) > 0) {

                foreach ($request->room_id as $key => $v){
                    $Odsarray = array(
                        'total_price' => $request->total_price[$key],
                        'order_date' => $request->order_date,
                        'status' => 0,
                        'month' => $request->month,
                        'year' => $request->year,
                        'room_id' => $request->room_id[$key],
                        'customer_id' => $request->customer_id[$key],
                        'juristic_id' => 1,
                        'user_id' => 1,
                        'meter_log_id' => $request->room_id[$key]
                    );
                    // create ORders
                    $CreateOds = Orders::create($Odsarray);
                    $lastCreate = $CreateOds->id;

                    // Create Order Details
                    $Odt = array(
                        'amount' => 1,
                        'price' => $request->total_price[$key],
                        'total' => $request->total_price[$key],
                        'service_id' => 1,
                        'order_id'=> $lastCreate
                    );
                    $createOdt = OrderDetails::create($Odt);
                }

                return redirect('/billmake')->with('success','ระบบทำการเพิ่มบิลรายเดือนเรียบร้อย');
            }
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
