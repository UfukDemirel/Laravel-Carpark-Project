<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    /**@var Blok|Model
     */

    public $blok;

    public function __construct(Blok $blok){
        $this->blok = $blok;
    }

    public function home(){
        return view('Frontend.home');
    }

    public function dashboard(){
        return view('Frontend.dashboard');
    }

    public function empty(){
        $emptya = $this->blok->bloka();
        $emptyb = $this->blok->blokb();
        $emptyc = $this->blok->blokc();
        return view('Frontend.empty',compact('emptya','emptyb','emptyc'));
    }

    public function details($id){
        $empty = $this->blok->blok($id);
        return view('Frontend.details',compact('empty'));
    }

    public function detailspost(Request $request){
        $emptya = $this->blok->bloka();
        $emptyb = $this->blok->blokb();
        $emptyc = $this->blok->blokc();
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'plate'=>'required',
            'email'=>'required',
            'check'=>'required',
            'date'=>'required'
        ]);

        $record = DB::table('record')->insert([
            "name"=>$request->name,
            "surname"=>$request->surname,
            "phone"=>$request->phone,
            "plate"=>$request->plate,
            "email"=>$request->email,
            "check"=>$request->check,
            "record_is_active"=>1,
            "users_id"=>$request->users_id,
            "block_id"=>$request->block_id,
            "date"=>$request->date
        ]);

        $update = DB::table('block')
            ->where('block_id','=',$request->block_id)
            ->update([
            "block_is_active"=>1
        ]);

        if ($record){
            Alert::success('Great!','Your parking lot is ready..');
            return back();
        }else{
            Alert::error('Error!','An error occurred while retrieving the parking space..');
            return back();
        }
    }

    public function full(){
        $data = DB::table('record')
            ->join('block','block.block_id','=','record.block_id')
            ->where('record_is_active','=','1')
            ->where('blok_name','=','A')
            ->get();

        $datab = DB::table('record')
            ->join('block','block.block_id','=','record.block_id')
            ->where('record_is_active','=','1')
            ->where('blok_name','=','B')
            ->get();

        $datac = DB::table('record')
            ->join('block','block.block_id','=','record.block_id')
            ->where('record_is_active','=','1')
            ->where('blok_name','=','C')
            ->get();

        return view('Frontend.full',compact('data','datab','datac'));
    }

    public function settings($id){
        $empty = DB::table('record')->where('record_id','=',$id)->get();
        return view('Frontend.settings',compact('empty'));
    }

    public function settingspost(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'plate'=>'required',
            'email'=>'required',
            'check'=>'required',
            'date2'=>'required'
        ]);

        $update = DB::table('record')
            ->where('block_id',$id)
            ->update(
                [
                    "name"=>$request->name,
                    "surname"=>$request->surname,
                    "phone"=>$request->phone,
                    "plate"=>$request->plate,
                    "email"=>$request->email,
                    "check"=>$request->check,
                    "record_is_active"=>$request->record_is_active,
                    "users_id"=>$request->users_id,
                    "block_id"=>$request->block_id,
                    "date2"=>$request->date2
                ]);

        $DD = DB::table('block')
            ->where('block_id','=',$request->block_id)
            ->update([
                "block_is_active"=>0
            ]);

        if($update){
            Alert::success('Success!', 'Update successful...');
            return back();
        }else{
            Alert::error('Error!', 'An error occurred while updating...');
            return back();
        }
    }
}
