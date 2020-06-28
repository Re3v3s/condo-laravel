<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildings;
use App\Models\Contacts;
use App\Models\Customers;
use App\Models\Juristics;
use App\Models\Rooms;






class ContactDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Contacts::select('contacts.id','contacts.create_date','contacts.end_date','contacts.price','rooms.name','customers.firstname')
        ->leftjoin('customers','customers.id','=','contacts.customer_id')
        ->leftjoin('rooms','rooms.id','=','contacts.room_id')
        ->get();

        // return dd($datas);
        return view('condo.Contacts.datact',compact('datas'));
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

        $Juris = Juristics::all();
        $DataShows = Contacts::select('contacts.create_date','contacts.end_date','contacts.price','contacts.earnest','rooms.name as r_name','customers.firstname',
                                    'customers.lastname','customers.address as c_address','customers.aumphur as c_aum','customers.district as c_dis','customers.province as c_province',
                                    'customers.postcode as c_postcode','buildings.name as b_name','buildings.address as b_add','buildings.amphur as b_aum',
                                    'buildings.district as b_dis','buildings.province as b_pro','buildings.postcode as b_post')
                                 ->leftjoin('rooms','rooms.id','=','contacts.room_id')
                                 ->leftjoin('customers','customers.id','=','contacts.customer_id')
                                 ->leftjoin('buildings','buildings.id','=','contacts.building_id')
                                 ->where('contacts.id','=',$id)
                                 ->get();
        return view('condo.Contacts.show', compact('DataShows','Juris'));

        // return dd($DataShows);
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
