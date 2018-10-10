<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HelloControler extends Controller
{

  public function index()
  {
    $users = User::all();
    return view('user.index',compact('users'));

}
public function create() 
{
   return view('user.create');
}


public function store(Request $request) 
{   
   $this ->validate($request,['fname' => 'required','lname' => 'required','nname' => 'required']);
   $user = new User ;
   $user->fname = $request->fname;
   $user->lname = $request->lname;
   $user->nname = $request->nname;
   $user->save();
   return redirect()->route('user.index')->with('success','บันทึกข้อมูลสำเร็จ');
}
public function destroy ($id){
    $user = User::find($id);
    $user->delete();
    return redirect() ->route('user.index')->with('success','ลบข้อมูลเรียบร้อย');
}
public function edit($id){
    $user = User ::find($id);
    return view('user.edit',compact('user','id'));
}
public function update(Request $request ,$id){
    $this ->validate($request,['fname' => 'required','lname' => 'required','nname' => 'required']);
    $user = User::find($id) ;
    $user->fname = $request->fname;
    $user->lname = $request->lname;
    $user->nname = $request->nname;
    $user->save();
    return redirect()->route('user.index')->with('success','อัพเดทข้อมูลสำเร็จ');
}
}
