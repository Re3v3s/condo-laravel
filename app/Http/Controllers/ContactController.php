<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Customers;
use App\Models\Rooms;
use App\Models\Buildings;
use App\Models\ContactTypes;
use App\Models\OrderDetails;
use App\Models\Orders;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $cus = Customers::all()->sortDesc();
        $rooms = Rooms::get()->where('customer_id','=','');
        $bd = Buildings::all();
        $Cct = ContactTypes::all();
        $ct = Contacts::get()->max('contact_no');



        $date = date('dmY');

        $Cf = date("Y-m-d H:i:s");
        // Cno เพิ่ม 0 หลัง $date ให้มีความยาวเป็น 12 ตัว ไม่รวม $date ถ้า $date มี 8 ตัว  ก็เพิ่มไปอีก 4 ให้ครบ 12
        // จะเป็น '26062020'+ '0000'
        $Cno = str_pad($date,'12',0);

        if($ct == null){
            $NewCno = $Cno;
        }else if ($Cno < $ct){
            $NewCno = $ct + 1;
        } else{
            $NewCno = $Cno;
        }

        // return dd($ct);

        return view('condo.Contacts.index',compact('cus','rooms','bd','Cct','ct','date','Cno','NewCno','Cf'));
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
        //กรณีเพิ่มข้อมูลลูกค้าใหม่จากหน้า Contact
        if($request->from_contact == 'from_contact'){
            Customers::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'aumphur' => $request->aumphur,
                'district' => $request->district,
                'province' => $request->province,
                'postcode' => $request->postcode,
                'phone' => $request->phone,
                'birthdate' => $request->birthdate,
                'idcard' => $request->idcard
            ]);

            return redirect('contacts');
        }
        // จบ IF


        //! Create Contact
        Contacts::create($request->all());

        // //! Update who live in Room by request-> room id
        $updateroom = Rooms::find($request->room_id);
        $updateroom->customer_id = $request->customer_id;
        $updateroom->save();

        //! create Bill with date
        // เดือน
        $Month = date('F');
        // ปี
        $Year = date('Y');
        // ไว้สำหรับ วันที่ออกบิล
        $today = date('Y-m-d');
        $total = ($request->price) + ($request->earnest);
        // สร้างบิล
       $CreBill = Orders::create([
            'total_price' => $total,
            'order_date' => $today,
            'status' => 0,
            'month' => $Month,
            'year' => $Year,
            'room_id' => $request->room_id,
            'customer_id' => $request->customer_id,
            'juristic_id' => 1,
            'user_id' => 1,
            'meter_log_id' => $request->room_id
        ]);
        // last insert Order ID
        $lastinsert = $CreBill->id;

        // Create Order detail after create Bill
        // service 1 = Rent
            $Rorder = OrderDetails::create([
                'amount' => 1,
                'price' => $request->price,
                'total' => $request->price,
                'service_id' => 1,
                'order_id' => $lastinsert
            ]);
        // service 4 = earnest
        $Rorder = OrderDetails::create([
            'amount' => 1,
            'price' => $request->earnest,
            'total' => $request->earnest,
            'service_id' => 4,
            'order_id' => $lastinsert
        ]);
        // return dd($request->all());
        return redirect('contacts');

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
