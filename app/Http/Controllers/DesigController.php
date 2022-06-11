<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Formdata;
use Illuminate\Support\Facades\DB;

use Session;

class DesigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "names with designations will be here";

        return redirect('showData');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $glo=$request->validate([
            'name'=>'required|max:15',
            'email'=>'required|email',
            'age'=>'required|numeric|min:18',
            'address'=>'required',
            'designation'=>'required'
        ]);


        $data=Formdata::create($glo);

 
/*         $desig=new Designation;
        $desig->id=$data->id;
        $desig->designation=$request->designation;
        $desig->user_id=$data->id;

        $desig->save(); */

        //Designation::create($glo);

        $data->desig()->create([
            'designation'=>$request->designation
/*             'user_id'=>$data->id */
        ]);
 

        Session::flash('msg','new employee added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Formdata::find($id)->desig;

        return $data;


        //return Designation::find($id)->form;



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$data= Designation::where('user_id',$id)->first();

        $data=DB::table('formdatas')
                ->join('designations','formdatas.id','=','designations.user_id')
                ->select('formdatas.*','designations.*')
                ->where('formdatas.id','=',$id)
                ->where('designations.user_id','=',$id)
                ->first();

        return view('editData',['data'=>$data]);

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
        $emid=$id;
/*         $request->validate([
            'designation'=>'required'
        ]);

        Formdata::where('fd',$id)->update([

        ]); */

        $id=Formdata::findOrFail($id);

        $data=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'age'=>'required',
            'address'=>'required',
            'designation'=>'required'
        ]);

        $id->update($data);
/* 
        Designation::where('id',$id)->update([
            'designation'=>$request->designation,
            'user_id'=>$id
        ]); */

        $desig=Designation::find($emid);

        $desig->designation=$request->designation;
        $desig->save();

        Session::flash('msg','designation updated of employee');

        return redirect('designation');


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
