<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildings;
use App\Models\Juristics;

class BuildingController extends Controller
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
        $data = Buildings::all();
        $jur = Juristics::where('id','=',1)->get();
        return view('condo.Buildings.index' , compact('data','jur'));

        // return dd(compact('data','jur'));
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
        Buildings::create($request->all());

        return redirect('buildings');
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
        $data = Buildings::find($id) ;

        return view('condo.Buildings.edit',compact('data'));
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
        $data = Buildings::find($id);
        $data->name = $request->name;
        $data->detail = $request->detail;
        $data->address = $request->address;
        $data->amphur = $request->amphur;
        $data->district = $request->district;
        $data->province = $request->province;
        $data->postcode = $request->postcode;
        $data->phone = $request->phone;
        $data->save();

        return redirect('buildings');

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
