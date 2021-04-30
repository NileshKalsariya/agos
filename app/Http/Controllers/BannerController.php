<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{   
     public function bannerAdd(request $request){
     
    $request->validate([
        'advertisementtitle'=>'required',
        'disc'=>'required',
        'banner'=>'required|mimes:jpeg,jpg,png' 
       ]);

       $banner = new Banner;
       $banner->offer_date = $request->input('offerdate');
       $banner->title = $request->input('advertisementtitle');
       $banner->banner_disc = $request->input('disc');
      
    if($request->has('banner')){
        $file= $request->file('banner');
        $extention = $file->getClientOriginalExtension();
        $filename =time().'.'.$extention;
        
        $file->Move(public_path('banners'),$filename);
        $banner->banner =$filename;
 }
 $banner->save();
 if($banner->save()){
    $request->session()->flash('success','Banner Added SuccessFully');
return redirect('banner');
 }
 else{
     return back()->with('fail','Some Error Occured');
 }
}
        public function bannerDetais(request $request){

             $banner = DB::table('banner')->paginate(5);
       return view('admin.bannerDetails',['data'=>$banner]);
        }

      public function RemoveBanner(request $request, $id){
          if($id==null){
            $request->session()->flash('delete','Banner Deleted Successfully');
              return redirect('banner');       
          }
       $deletebanner = Banner::find($id);
       $deletebanner->delete();
       $request->session()->flash('delete','Banner Deleted Successfully');
       return redirect('banner');
      }

      public function EditBanner(request $request,$id){
      $bannerDetails = Banner::find($id);
      return view('admin.updateBanner',['bannerDetail'=>$bannerDetails]);
      }
      public function UpdateBanner(request $request){
        $request->validate([
            'advertisementtitle'=>'required',
            'disc'=>'required',
            'banner'=>'required|mimes:jpeg,jpg,png' 
           ]);
    
    if($request->has('banner')){
        $file= $request->file('banner');
        $extention = $file->getClientOriginalExtension();
        $filename =time().'.'.$extention;
        $file->Move(public_path('banners'),$filename);
    
   
          $data = Banner::find($request->id);

          $data->offer_date = $request->input('offerdate');
            $data->title =$request->input('advertisementtitle');
            $data->banner_disc = $request->input('disc');
            $data->banner=$filename;
            $data->save();
      
        $request->session()->flash('update','Banner updated SuccessFully');
 return redirect('banner'); 
    }     
}
}


//  $uid = $req->input('id');
//  DB::table('register')->where('id',$uid)->update([
//        'name'=>$req->input('name'),
//        'email'=>$req->input('email'),
//        'mobile'=>$req->input('mobile'),
//        'password'=>Hash::make($req->input('password'))
//  ]);