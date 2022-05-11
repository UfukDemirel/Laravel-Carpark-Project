<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    protected $table = "block";

    public function blok($id){
        return $this->select('*')->where('block_id','=',$id)->get();
    }

    public function bloka(){
        return $this->select('*')->where('blok_name','=','A')->where('block_is_active','=','0')->get();
    }

    public function blokb(){
        return $this->select('*')->where('blok_name','=','B')->where('block_is_active','=','0')->get();
    }

    public function blokc(){
        return $this->select('*')->where('blok_name','=','C')->where('block_is_active','=','0')->get();
    }

}
