<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use Illuminate\Routing\UrlGenerator;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Excel;
use App\Http\Controllers\HelloControler;
use DB;
use log;
use Maatwebsite\Excel\Concerns\ToModel;
class HelloControler extends Controller
{


  public function import(Request $request){
   if($request->hasFile('file')){
    $path = $request->file('file')->getRealPath();

        // log::info($data);
    $data = Excel::load($path,function($reader){})->get();
    if (!empty($data)&&$data->count()) {
      foreach ($data as $key => $value) {
        $contact = new User();
        $contact->fname = $value['fname'];
        $contact->lname = $value['lname'];
        $contact->nname = $value['nname'];
        $contact->save();
      }
    }
  }
  return back();
}



public function export() 
{
  $users = DB:: table('users')->get()->toArray();
  $users_Array[] = array('fname','lname','nname');
  foreach ($users as $user ) {
    $users_Array[] =  array(
      'First name' => $user->fname,
      'Last name' => $user->lname,
      'Nickname' => $user->nname
    );
  }
  Excel::create('user_data',function($excel)use($users_Array)
  {

    $excel->setTitle('user_data');
    $excel->sheet('user_data',function($sheet)
      use($users_Array)
      {
        $sheet->fromArray($users_Array, null,'A1',false,false);
      });

  })-> download('xlsx');

  // return Excel::import(new UsersImport, 'users.xlsx');
}

public function index()
{
  return view('user.index'); 
  //   $users = User::all();   
  // return view('user.index',compact('users'));
}


public function select()
{
 $users = User::all();   
 return view('user.select',compact('users'));
}
public function welcome()
{
 $users = User::all();   
 return view('welcome',compact('users'));
}
public function get_datatable(Request $request)
{
  // return datatables()->eloquent(User::query())->toJson();
 $users = User::select(['id', 'fname', 'lname', 'nname'])->orderby("id","desc");
 return Datatables::of($users)
 ->filter(function ($query) use ($request) {
  if ($request->has('fname')) {
    $query->where('fname', 'like', "%{$request->get('fname')}%");
  }
  if ($request->has('lname')) {
    $query->where('lname', 'like', "%{$request->get('lname')}%");
  }

  if ($request->has('nname')) {
    $query->where('nname', 'like', "%{$request->get('nname')}%");
  }
})
 ->addColumn('action', function ($users) {
   $tex = "'you want to delete?'";

   return 
   '
   <a data-toggle="modal" data-target="#myModal1" onclick="btn_edit('.$users->id.')" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
   <a href="'.url('delete').'/'.$users->id.'"  onclick="return confirm('.$tex.');"  class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
   ';
 })

 ->make(true);
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

public function destroy ($id)
{
  $user = User::find($id);
  $user->delete();
  return redirect() ->route('user.index')->with('success','ลบข้อมูลเรียบร้อย');
}

public function edit($id)
{
  $user = User::find($id);
  return view('user.edit',compact('user','id'));
}

public function update(Request $request ,$id)
{
  $this ->validate($request,['fname' => 'required','lname' => 'required','nname' => 'required']);
  $user = User::find($id) ;
  $user->fname = $request->fname;
  $user->lname = $request->lname;
  $user->nname = $request->nname;
  $user->save();
  return redirect()->route('user.index')->with('success','อัพเดทข้อมูลสำเร็จ');
}

public function update2(Request $request)
{
  $user = User::find($request->id) ;
  $user->fname = $request->fname;
  $user->lname = $request->lname;
  $user->nname = $request->nname;
  $user->save();
  return redirect()->route('user.index')->with('success','อัพเดทข้อมูลสำเร็จ');
}

public function et($id ) {
  $user = User::find($id) ;
  return response()->json(['result'=>$user]);
  # code...
}
}
