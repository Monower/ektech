<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formdata;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function getForm(){
        return view('formPage');
    }


    public function addData(Request $r){
       $data=new Formdata;

       $data->name=$r->name;
       $data->email=$r->email;
       $data->age=$r->age;
       $data->address=$r->address;

       $data->save();
       


       $id=Formdata::find($data->id);

       $desig=new Designation;
       $desig->designation=$r->designation;
       $desig->fid=$data->id;
       $desig->id=$data->id;

       $data->desig()->save($desig);

       return redirect('showData');
    }

    public function showData(){
        //$data=Formdata::all();

        //return view('showData',['data'=>$data]);

                 $data=DB::table('formdatas')
                    ->join('designations','formdatas.id','=','designations.user_id')
                    ->select('formdatas.*','designations.*')
                    ->get();


        return view('showData',['data'=>$data]);


    }

    public function editData($id){
        $data=FormData::where('id',$id)->first();

        return view('editData',['data'=>$data]);
    }

    public function editFormData(Request $r){

        $data=Formdata::find($r->id);
        $data->name=$r->name;
        $data->email=$r->email;
        $data->age=$r->age;
        $data->address=$r->address;
 
        $data->save();

        return redirect('showData');


    }

    public function delData($id){
        Formdata::destroy($id);

        return redirect('showData');

    }

    public function showRelation($id){
        return Formdata::find($id)->desig;
    }
    
}
