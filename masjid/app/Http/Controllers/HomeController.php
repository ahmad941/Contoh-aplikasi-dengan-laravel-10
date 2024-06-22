<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
    public function index(Request $request){
         $data = new User;

        if ($request->get('search')) {
           
            $data = $data->where('name', 'LIKE', '%'.$request->get('search').'%' )->
            orWhere('email', 'LIKE', '%'.$request->get('search').'%');  
    }
      $data = $data->get();
        return view('index', compact('data', 'request'));
}

    public function create(){
        return view('create');
    }
    public function store(Request $request)  {
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
            'password'=>'required',

        ]);
            if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
            
            $image = $request->file('image');
            $filename = date('y-m-d').$image->getClientOriginalName();
            $path = 'photo-user/'.$filename;
            
            Storage::disk('public')->put($path,file_get_contents($image));


            $data['email'] = $request->email;
            $data['name'] = $request->name;
            $data['password'] = Hash::make($request->password);
            $data['image'] =  $filename;

            User::create($data);
            return redirect()->route('admin.index');
    }

    public function edit(Request $request,$id){
        $data = User::find($id);
        // dd($data);
        return view('edit', compact('data'));    
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'name' => 'required',
            'password'=>'nullable',

        ]);
            if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
           
            $data['email'] = $request->email;
            $data['name'] = $request->name;

            if ($request->password) {
               $data['password'] = Hash::make($request->password);
            }
           
            User::whereId($id)->update($data);
            return redirect()->route('admin.index');
   
    }

    public function delete(Request $request,$id){
        $data=User::find($id);

        if ($data){
            $data->delete();
        }

        return redirect()->route('index');
    }
}
