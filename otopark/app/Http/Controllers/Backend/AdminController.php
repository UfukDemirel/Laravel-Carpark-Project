<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**@var Blok|Model
     */

    public $blok;

    public function __construct(Blok $blok){
        $this->blok = $blok;
    }

    public function dashboard(){
        return view('Backend.dashboard');
    }

    public function welcome(){
        return view('Backend.welcome');
    }

    public function emptyadmin(){
        $emptya = $this->blok->bloka();
        $emptyb = $this->blok->blokb();
        $emptyc = $this->blok->blokc();
        return view('Backend.emptyadmin',compact('emptya','emptyb','emptyc'));
    }

    public function fulladmin(){
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

        return view('Backend.fulladmin',compact('data','datab','datac'));
    }

    public function settingsadmin($id){
        $empty = DB::table('record')->where('record_id','=',$id)->get();
        return view('Backend.settings',compact('empty'));
    }

    public function settingspostadmin(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'plate'=>'required',
            'email'=>'required',
            'check'=>'required'
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
                    "block_id"=>$request->block_id
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

    public function table(){
        $table = DB::table('record')->join('users','users.id','=','record.users_id')->where('check','=','1')->get();
        return view('Backend.table',compact('table'));
    }

    public function edit($id){
        $edit = DB::table('record')->where('record_id',$id)->get();
        return view('Backend.edit',compact('edit'));
    }

    public function editpost(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'plate'=>'required',
            'email'=>'required',
            'check'=>'required'
        ]);

        $update = DB::table('record')
            ->where('record_id',$id)
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
                    "block_id"=>$request->block_id
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

    public function user(){
        $user = DB::table('users')->where('permission_level','=','user')->get();
        return view('Backend.user',compact('user'));
    }

    public function useredit($id){
        $user = DB::table('users')->where('id',$id)->get();
        return view('Backend.useredit',compact('user'));
    }

    public function usereditpost(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'is_active'=>'required'
        ]);

        $update = DB::table('users')
            ->where('id',$id)
            ->update(
                [
                    "name"=>$request->name,
                    "surname"=>$request->surname,
                    "phone"=>$request->phone,
                    "email"=>$request->email,
                    "is_active"=>$request->is_active
                ]);

        if($update){
            Alert::success('Success!', 'Update successful...');
            return back();
        }else{
            Alert::error('Error!', 'An error occurred while updating...');
            return back();
        }
    }

    public function profil(){
        $edit = DB::table('users')->where('id',Auth::id())->get();
        return view('Backend.profil',compact('edit'));
    }

    public function profilpost(Request $request){

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $update = DB::table('users')
            ->where('id',Auth::id())
            ->update(
                [
                    "name"=>$request->name,
                    "surname"=>$request->surname,
                    "phone"=>$request->phone,
                    "email"=>$request->email,
                ]);

        if($update){
            Alert::success('Success!', 'Update successful...');
            return back();
        }else{
            Alert::error('Error!', 'An error occurred while updating...');
            return back();
        }
    }

    public function delete($id){
        $delete = DB::table('users')->Delete($id);
        if ($delete){
            Alert::success('Great!', 'profile deleted..');
            return back();
        }else{
            Alert::error('Error!', 'Profile could not be deleted..');
            return back();
        }
    }

}
