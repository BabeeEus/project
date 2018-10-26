// public function import(Request $request){
//  if($request->hasFile('file')){
//   $path = $request->file('file')->getRealParh();
//   $data = Excel::load($path,function($reader){})->get();
//   if (!empty($data)&&$data->count()) {
//     foreach ($data as $key => $value) {
//       $contact = new Contact();
//       $contact->fname = $value->fname;
//       $contact->lname = $value->lname;
//       $contact->nname = $value->nname;
//       $contact->save();
//     }
//   }
// }
// return back();
// }
