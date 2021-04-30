<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
class FaqController extends Controller
{
    public function index(request $req){
        return view('admin.faqmain');
    }
    public function store(request $req){
    $req->validate([
       'question'=>'required',
       'answer'=>'required'
    ]);
     
    $addfaq = new Faq();
    $addfaq->question  = $req->post('question');
    $addfaq->answer  = $req->post('answer');
   if( $addfaq->save()){
       $req->session()->flash('success','new Faq add');
       return redirect('/faqshow');
   }
    }
    public function show(request $req){
        $Faqdata = Faq::paginate(10);
       return view('admin.faqshow',['data'=>$Faqdata]);
    }
    
    public function showedit(request $req,$id){
   
         $Faqdata = Faq::findorFail($id);
          return view('admin.editfaq',['data'=>$Faqdata]);
    }

    
    public function editnstore(request $req){
        $edit_id = $req->post('id');
        $Faqdata = Faq::findorFail( $edit_id);
        $Faqdata->question = $req->question;
        $Faqdata->answer = $req->answer;  
      if($Faqdata->save()){
        $req->session()->flash('success','Faq Updated.');
        return redirect('/faqshow');
      }   
   }
  
      
   public function  delete(request $req,$id){
    
    $Faqdata = Faq::findorFail($id);
     
   if($Faqdata->delete()){
    $req->session()->flash('success','Faq Deleted.');
    return redirect('/faqshow');
   }
}
public function showmain(){
    $Faqdata = Faq::get();
    return view('user.faq',['data'=>$Faqdata]);
}
}
