<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class NotesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function addNotes(){
        return view('addnote');
    }
    public function postNotes(Request $request){
        $this->validate($request,[
            'topic'=>'required',
            'subject'=>'required',
            'notes'=>'required'
        ]);
        $user=\Auth::user();
        $newnote= new   \App\Note;
        $newnote->user_id=$user->id;
        $newnote->topic=Str::slug(($request->topic));
        $newnote->subject=$request->subject;
        $newnote->notes=$request->notes;
        $newnote->save();
        return redirect('/home');
    }

    public function viewnotes()
    {
        $user=\Auth::user();
        $allnotes= \App\Note::where('user_id',$user->id)->get();
        $allsubjects =\App\Note::where('user_id',$user->id)->distinct('subject')->get(['subject']);
        return view('allnotes',compact('allsubjects','allnotes'));
    }

    public function errordisplay()
    {
        return view('error404');
    }
    public function viewsubnotes(Request $request)
    {
            $user=\Auth::user();
            $subject=$request->segment(3);
            $check = \App\Note::where('subject',$subject)->get('topic')->first();;
           if($check == null)
           {
               return view('error404');
           }
            else
            {
                $data=\App\Note::where('user_id',$user->id)->where('subject',$subject)->get(['topic','created_at']);
                return view('topics',compact('data'));
            }
          
    }
    public function shownotes(Request $request)
    {
        $user=\Auth::user();
        $notesreq=$request->segment(4);
        

        $stuff=\App\Note::where('user_id',$user->id)->where('topic',$notesreq)->get(['notes','subject','topic'])->first();
        //dd($stuff);
        return view('shownotes',compact('stuff'));
    }

    public function showuploadmenu(){
        return view('uploadfiles');

    }
    public function uploadfile(Request $request){
        $user=\Auth::user();
        
        $this->validate($request,[
            'title'=>'required',
            'file'=>'required|mimetypes:application/pdf|max:100000',

        ]);
       
        if($request->hasFile('file')){
            $file= $request->file('file');
            $extension=$file->getClientOriginalExtension();
            $filename=time(). '.'. $extension;
            $file->move('uploads/',$filename);
         }
         $document = new \App\FileUpload();
         $document->title=$request->title;
         $document->attachment=$filename;
         $document->user_id=$user->id;
         $document->save();
         return redirect('/home')->with('success','Note uploaded successfully!');
    }
    public function showuploaded()
    {
        $user=\Auth::user();
        $getdocuments=\App\FileUpload::where('user_id',$user->id)->get();
        return view('showuploadedfiles',compact('getdocuments'));
       
    }
    public function downloadfile(Request $request){
        $user=\Auth::user();
        //validate the file name from the request
       $this->validate($request,[
           'file'=>'required',
           'title'=>'required'
       ]);
       $doc=$request->file;
       $title=$request->title;
       //check if the file belongs to that user or not 
       $check=\App\FileUpload::where('attachment',$doc)->where('user_id',$user->id)->exists();
       if($check == true)
       {
        $file=public_path()."/uploads/$doc";
        $headers = array(
         'Content-Type: application/pdf',
       );
       return response()->download($file, $title.'.pdf', $headers);
          
       }
       else{
           return view('accessdenied');

       }
       


    }
    public function deletefile(Request $request){
        $user=\Auth::user();
        $this->validate($request,[
            'file'=>'required'
        ]);
        $doc=$request->file;
        $record=\App\FileUpload::where('attachment',$doc)->where('user_id',$user->id)->exists();
            if($record == true){
                $file=public_path()."/uploads/$doc";
                \App\FileUpload::where('attachment',$doc)->where('user_id',$user->id)->delete();
                File::delete($file);
                

            }
            else{
                return view('accessdenied');
            }
        return redirect('/home')->with('success','File deleted  successfully!');

    }
    public function upload(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
    }
    
}

}
