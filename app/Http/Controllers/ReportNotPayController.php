<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
class ReportNotPayController extends Controller
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
        return view('condo.reportnopay.index');
    }

    public function nopay(Request $request){

        if(isset($request)){
            $month = $request->month;
            $year = $request->year;
        }
        $num = 1;
        $nopays = Orders::select('orders.status','rooms.name as r_name')
                            ->leftjoin('rooms','rooms.id','=','orders.room_id')
                            ->where('orders.month','=',$month)
                            ->where('orders.year','=',$year)
                            ->where('orders.status','=',0)
                            ->get();
        // if(count($nopays) > 0){
            // return dd($nopays);
            return view('condo.reportnopay.index',compact('nopays','month','year','num'));
        // }else {
        //     // return dd($nopays);
        //     return view('condo.reportnopay.index',compact('month','year'));
        // }

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
