<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|writer');
    }
    public function index(){
            return view('dashboard.index');
    }

    public function userview(Request $request){
        $data = new User;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('dashboard.user',compact('data','request'));
    }

    public function usercreate(){
        return view('dashboard.users.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5120'

        ]);

        if($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'profil-image-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $filename;

        User::create($data);

        return redirect()->route('admin.user');

    }

    public function detail(Request $request,$id){
        $data = User::find($id);

        return view('dashboard.users.detail',compact('data'));
    }
    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('dashboard.users.edit',compact('data'));
    }

    public function update(Request $request,$id){
        // $image = $request->file('image');
        // dd($image);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:5120',
        ]);

        if($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        $find = User::find($id);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $image = $request->file('image');

        if ($image) {
            $filename = date('Y-m-d').$image->getClientOriginalName();
            $path = 'profil-image-user/'.$filename;

            if ($find->image) {
                Storage::disk('public')->delete('profil-image-user/'.$find->image);
            }

            Storage::disk('public')->put($path,file_get_contents($image));

            $data['image'] = $filename;
        }
        $find->update($data);

        return redirect()->route('admin.user');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);
        if($data){
            $data->delete($id);
        }

        return redirect()->route('admin.user');
    }

}
