<?php

namespace App\Http\Controllers;

use App\Models\KasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KasController extends Controller
{
    public function index(){
       // return view('kas.index');
      $data = DB::table('kas_masjid');
         $data = $data->get();
        return view('kas.index', compact('data'));
}
    
    public function create(){
        return view('kas.create-kas');
    }


public function store(Request $request) {
    $validator = Validator::make($request->all(),[
        'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        'type' => 'required',
        'nominal'=> 'required|between:0,99.99',
        'des'=> 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    $image = $request->file('image');
    $filename = date('y-m-d').$image->getClientOriginalName();
    $path = 'photo-kas/'.$filename;

    Storage::disk('public')->put($path, file_get_contents($image));

    $data = [
        'type' => $request->type,
        'nominal' => $request->nominal,
        'des' => $request->des,
        'image' => $filename
    ];

    KasModel::create($data); // Menggunakan model Kas untuk menyimpan data

    return redirect()->route('admin.kas.index');
}

public function edit(Request $request,$id){
        $data = KasModel::find($id);
        // dd($data);
        return view('kas.edit-kas', compact('data'));    
    }

    // `type`, `nominal`, `des`, `image`
public function update(Request $request,$id){
      $validator = Validator::make($request->all(),[
        'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        'type' => 'required',
        'nominal'=> 'required|between:0,99.99',
        'des'=> 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $image = $request->file('image');
            $filename = date('y-m-d').$image->getClientOriginalName();
            $path = 'photo-kas/'.$filename;

            Storage::disk('public')->put($path, file_get_contents($image));

            $data = [
                'type' => $request->type,
                'nominal' => $request->nominal,
                'des' => $request->des,
                'image' => $filename
            ];

            KasModel::whereId($id)->update($data);
            return redirect()->route('admin.kas.index');
   
    }

public function delete(Request $request,$id){
        $data=KasModel::find($id);

        if ($data){
            $data->delete();
        }

        return redirect()->route('admin.kas.index');
    }

}
