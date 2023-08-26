<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\typephone;
use Config , Validator;

class TypephoneController extends Controller
{
    public function index () {
        $typephones = typephone::all();
        return view('typephone/index', compact('typephones'));
    }

    public function search(Request $request) {
        $query = $request->q;
        
        if($query) {
        $typephones = typephone::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', '%' . $query . '%')
            ->get();
        } else {
            $typephones = typephone::all();
        }

        return view('typephone/index', compact('typephones'));
    }

    public function edit ($id = null) {

        if ($id) {
            $typephones = typephone::find($id); return view('typephone/edit')
            ->with('typephones', $typephones);
        } else {
            return view('typephone/add');
        }
        
    }

    public function update (Request $request) {
        $rules = [
            'name' => 'required',
        ];

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );

        $id = $request->id;
       
        $temp = array(
            'name' => $request->name, 
        );

        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect('typephone/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $typephones = typephone::find($id);
        $typephones->name = $request->name;
        $typephones->save();

        return redirect('typephone')
        ->with('ok' , 'true')
        ->with('msg' ,'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function insert (Request $request) {
        $rules = [
            'name' => 'required',
        ];

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );

        $temp = array(
            'name' => $request->name, 
        );

        $id = $request->id;

        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect('typephone/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $typephones = new typephone();
        $typephones->name = $request->name;
        $typephones->save();
    
    
        return redirect('typephone')
        ->with('ok' , 'true')
        ->with('msg' ,'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function remove($id) {
        typephone::find($id)->delete();
        return redirect('type')
        ->with('ok', 'True')
        ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');
  }







}
