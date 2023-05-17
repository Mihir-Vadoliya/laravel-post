<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ChangePassRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('type','2')->where('status','1')->get();
        return view('admin.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'status' => $request->status,
        ];

        if ($validated){
            $data = User::create($data);
            return redirect()->route('users.index')->with(['success' => 'User Added Successfully.']);
        }else{
            return redirect()->back()->withErrors($validated);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userEditRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type??2
        ];
        if ($validated){
            $data = User::whereId($request->edit)->update($data);
            return redirect()->route('users.index')->with(['success' => 'User Update Successfully.']);
        }else{
            return redirect()->back()->withErrors($validated);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::whereId($id)->delete();

        if ($delete){
            return redirect()->route('users.index')->with(['success' => 'User Deleted Successfully.']);
        }else{
            return redirect()->route('users.index')->with(['error' => 'User Not Deleted']);
        }
    }

    public function checkEmail(Request $request,$id=""){
        $email = $request->email;

        if(isset($id)){
            $userInfo["cnt"] = User::where(["email" => $email])->where('id','!=',$id)->get()->count();
        }else{
            $userInfo["cnt"] = User::where(["email" => $email])->get()->count();
        }

        if ($userInfo["cnt"] > 0) {
            $resp = 1;
        } else {
            $resp = 0;
        }
        echo ($resp == 1) ? "false" : "true";
        exit;
    }

    public function profile(Request $request){
        $id = Auth()->user()->id;

        $data = User::find($id);
        return view('pages.user.profile',compact('data'));
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'name' => $request->name,
            'userid' => $request->userid,
            'email' => $request->email
        ];
        if ($validated){
            $data = User::whereId($request->edit)->update($data);
            
            return redirect()->route('my-profile')->with(['success' => 'Profile Update Successfully.']);
        }else{
            return redirect()->back()->withErrors($validated);
        }
    }

    public function changePassword(Request $request){
        $id = Auth()->user()->id;

        $data = User::find($id);
        return view('pages.user.change-password',compact('data'));
    }

    public function changePasswordPost(ChangePassRequest $request){
        $validated = $request->validated();
        $id = Auth()->user()->id;

        if ($validated){
            $data = User::whereId($id)->update(['password'=> Hash::make($request->new_password)]);
            
            return redirect()->route('change-password')->with(['success' => 'Password Change Successfully.']);
        }else{
            return redirect()->back()->withErrors($validated);
        }
    }   

}
