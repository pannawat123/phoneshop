<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phone;
use App\Models\typephone;
use Config , Validator;

class phoneController extends Controller
{
    public function index () {
        $phones = phone::all();
        return view('phone/index', compact('phones'));
    }

    public function search(Request $request) {
        $query = $request->q;
        
        if($query) {
        $phones = phone::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('price', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', '%' . $query . '%')
            ->get();
        } else {
            $phones = phone::all();
        }


        return view('phone/index', compact('phones'));
    }

    public function edit ($id = null) {

        $typephones = typephone::pluck('name', 'id')->prepend('Please select', '');
        if ($id) {
            $phones = phone::find($id); return view('phone/edit')
            ->with('phones', $phones)
            ->with('typephones', $typephones);
        } else {
            return view('phone/add')
            ->with('typephones', $typephones);
        }
        
    }

    public function update (Request $request) {
        $rules = [
            'id' => 'required|numeric', //ต้องมีค่า และต้องเป็นตัวเลขเท่านั้น
            'name' => 'required',
            'price' => 'numeric',
            'typephone_id' => 'required|numeric',
        ];

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );  

        $id = $request->id;
        
        $temp = array(
        'id' => $request->id, 
        'name' => $request->name,
        'price' => $request->price,
        'typephone_id' => $request->typephone_id);

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('phone/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $phones = phone::find($id);
        $phones->name = $request->name;
        $phones->price = $request->price;
        $phones->typephone_id = $request->typephone_id;
        
        $phones->save();

        if($request->hasFile('image'))
        {
            $f = $request->file('image');
            $upload_to = 'upload/images';
    
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;
    
            $f->move($absolute_path, $f->getClientOriginalName());
            $phones->image_url = $relative_path;
            $phones->save();
        }
        
    
        return redirect('phone')
        ->with('ok', 'True')
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function insert(Request $request) {

        $rules = array (
            'id' => 'required|numeric', //ต้องมีค่า และต้องเป็นตัวเลขเท่านั้น
            'name' => 'required',
            'price' => 'numeric',
            'typephone_id' => 'required|numeric',
        );

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );

        $id = $request->id;
        $temp = array (
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'typephone_id' => $request->typephone_id,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('phone/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $phones = new phone();
        $phones->name = $request->name;
        $phones->price = $request->price;
        $phones->typephone_id = $request->typephone_id;
        
        $phones->save();

        if($request->hasFile('image'))
        {
            $f = $request->file('image');
            $upload_to = 'upload/images';
    
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;
    
            $f->move($absolute_path, $f->getClientOriginalName());
            $phones->image_url = $relative_path;
            $phones->save();
        }


        return redirect('phone')
        ->with('ok', 'True')
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        
    }

    public function remove($id) {
        phone::find($id)->delete();
        return redirect('product')
        ->with('ok', 'True')
        ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');

    }



}
