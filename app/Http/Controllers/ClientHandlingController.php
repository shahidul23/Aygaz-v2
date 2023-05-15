<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;

class ClientHandlingController extends Controller
{
    public function collerNumber($number){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $districts = DB::table('districts')->orderBy('name', 'ASC')->get();
        $info = DB::table('aygas')->where('phone', $number)->latest('date')->first();
        if ($info) {
            return view('CRM._user_info',compact('data','districts','info'));
        } else {
            return view('CRM.popup',compact('data','districts','number'));
        }
        
        return view('CRM.popup',compact('data','districts','number'));
    }
    public function outbound(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $districts = DB::table('districts')->orderBy('name', 'ASC')->get();

        return view('CRM.manual',compact('data','districts'));

    }
    public function OutboundDataSubmit(Request $request){
        $request->validate([
            'phone' => 'required|max:11|min:7',
            'name' => 'required|max:100',
        ]);
        $data = array();
        $data['date'] = date('Y-m-d H:i:s'); 
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['call_source'] = $request->outbound;
        $data['address'] = $request->address;
        $data['location'] = $request->district;
        $data['company_name'] = $request->currentCpmpany;
        $data['cylinder'] = $request->cylinderType;
        $data['source'] = $request->source;
        $data['query'] = $request->queryType;
        $data['remark'] = $request->remarks;

        $result = DB::table('aygas')->insert($data);
        if ($result) {
            return redirect()->route('client.list')->with('success','Client details save successfully');
        } else {
            return back()->with('error','Client details dose not save !');
        }
    }
    public function InboundDataSubmit(Request $request){
        $request->validate([
            'phone' => 'required|max:11|min:7',
            'name' => 'required|max:100',
        ]);
        $data = array();
        $data['date'] = date('Y-m-d H:i:s'); 
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['call_source'] = $request->Inbound;
        $data['address'] = $request->address;
        $data['location'] = $request->district;
        $data['company_name'] = $request->currentCpmpany;
        $data['cylinder'] = $request->cylinderType;
        $data['source'] = $request->source;
        $data['query'] = $request->queryType;
        $data['remark'] = $request->remarks;

        $result = DB::table('aygas')->insert($data);
        if ($result) {
            return redirect()->route('client.list')->with('success','Client details save successfully');
        } else {
            return back()->with('error','Client details dose not save !');
        }
    }

    public function clientList(){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        $info = DB::table('aygas')->orderBy('id', 'DESC')->get();
        return view('CRM.table._client_list',compact('data','info'));
    }
    public function searchClientList(Request $request){
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }

        $info = DB::table('aygas')->select()
            ->where('date', '>=', $request->from_date)
            ->where('date', '<=', $request->to_date)->get();
        return view('CRM.table._client_list',compact('data','info'));    

    }
}
