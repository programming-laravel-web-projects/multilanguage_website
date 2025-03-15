<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;
use  App\Http\Requests\Setting\UpdateTitleRequest;
use  App\Http\Requests\Setting\UpdateFavRequest;
use  App\Http\Requests\Setting\UpdateLogoRequest;
use App\Http\Requests\Setting\StoreSocialRequest;
use App\Http\Requests\Setting\UpdateSocialRequest;
use App\Http\Requests\Setting\UpdateEmailRequest;
use App\Http\Requests\Setting\UpdatePhoneRequest;
use App\Models\LocationSetting;
use  App\Http\Requests\Setting\UpdateWhatsRequest;
use  App\Http\Requests\Setting\UpdateLocationRequest;
use App\Http\Requests\Setting\UpdateContactEmailRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getbasic()
    {
        $strgCtrlr = new StorageController(); 
       $path= $strgCtrlr->SitePath('image');
        
         
        $List = Setting::select( 'id','name1',
        'value1',
        'name2',
        'value2',
        'name3',
        'value3',
        'category',
        'dep',
        'sequence',
        'section',
        'location',
        'is_active',)->where('category','site-info')->get();
$titlerow= $List->where('dep','title')->first();
$title=$titlerow->value1;
$desc=$titlerow->value2;
$meta=$titlerow->value3;
$logorow= $List->where('dep','logo')->first();
$favicon=  $strgCtrlr->getPath($logorow->value1, $path);
$favicon=($favicon==''?$strgCtrlr->DefaultPath('image'):$favicon);
$logo=$strgCtrlr->getPath($logorow->value2, $path);
$logo=($logo==''?$strgCtrlr->DefaultPath('image'):$logo);
$whatsrow= $List->where('dep','whatsapp')->first();
$whats=$whatsrow->value1;
$locationrow= $List->where('dep','location')->first();
$location=$locationrow->value1;
$contact_emailrow=$List->where('dep','contact_email')->first();
$contact_email=$contact_emailrow->value1;
        return view("admin.setting.basic", [          
        "title"=>$title,
        "desc"=>$desc,
        "meta"=>$meta,
        "favicon"=>$favicon,
        "logo"=>$logo, 
        "whats"=>$whats,   
        "location"=>$location,
        "contact_email"=>$contact_email,
        ]);
    }

    public function updatetitle(UpdateTitleRequest $request)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {
      return response()->json($validator);
    } else { 
        $item = Setting::where('category','site-info')->where('dep','title')->first();
      Setting::find( $item->id)->update([      
        'value1'=> $formdata['title'],       
        'value2'=> $formdata['desc'],
         'value3'=> $formdata['meta'],
      ]);  
      return response()->json("ok");
    }
    }
    public function updatefav(UpdateFavRequest $request)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {

      return response()->json($validator);

    } else {
        $item = Setting::where('category','site-info')->where('dep','logo')->first();
      if ($request->hasFile('favicon')) {
        $file = $request->file('favicon');
        // $filename= $file->getClientOriginalName();                
        $this->storeImage($file,$item->id,'value1');
      } 
      return response()->json("ok");
    }
    }
    public function updatelogo(UpdateLogoRequest $request)
    {
        $formdata = $request->all();
        $validator = Validator::make(
          $formdata,
          $request->rules(),
          $request->messages()
        );
        if ($validator->fails()) {
    
          return response()->json($validator);
    
        } else {
            $item = Setting::where('category','site-info')->where('dep','logo')->first();
          if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // $filename= $file->getClientOriginalName();                
            $this->storeImage($file,$item->id,'value2');
          }
       
      
          return response()->json("ok");
        }
    }
    public function updatewhats(UpdateWhatsRequest $request)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {
      return response()->json($validator);
    } else { 
        $item = Setting::where('category','site-info')->where('dep','whatsapp')->first();
      Setting::find( $item->id)->update([      
        'value1'=> $formdata['whatsapp'],       
        
      ]);  
      return response()->json("ok");
    }
    }
    //location
    public function updatelocation(UpdateLocationRequest $request)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {
      return response()->json($validator);
    } else { 
        $item = Setting::where('category','site-info')->where('dep','location')->first();
      Setting::find( $item->id)->update([      
        'value1'=> $formdata['location'],       
        
      ]);  
      return response()->json("ok");
    }
    }

    //social
    
    public function getsocial()
    {
      //   $strgCtrlr = new StorageController(); 
      //  $path= $strgCtrlr->SitePath('image');
        
         
        $List = Setting::select( 'id','name1',
        'value1',
        'name2',
        'value2',
        'name3',
        'value3',
        'category',
        'dep',
        'sequence',
        'section',
        'location',
        'is_active',)->where('category','social')->get();
 
        return view("admin.setting.showsocial", ["List"=>$List]);
    }
    public function createsocial()
    {
        return view("admin.setting.createsocial");
    }
    public function editsocial($id)
    {
      $item = Setting::find($id);
 
      //
   
        return view("admin.setting.editsocial", ["item" => $item]);
    }
    public function storesocial(StoreSocialRequest $request)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {
      return response()->json($validator);
    } else { 
      $newObj  = new Setting();
      $newObj->name1 = 'Name';
      $newObj->value1 = $formdata['name'];
      $newObj->name2 = 'Code';
      $newObj->value2 = $formdata['code'];
      $newObj->name3 = 'Link';
      $newObj->value3 = $formdata['link'];
      $newObj->category = 'social';
      $newObj->dep ='';
      $newObj->sequence = 0;
      $newObj->section = '';
      $newObj->location = '';
      $newObj->is_active = isset ($formdata["is_active"]) ? 1 : 0; 
      $newObj->save(); 
      return response()->json("ok");
    }
    }
    public function updatesocial(UpdateTitleRequest $request,$id)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {
      return response()->json($validator);
    } else {        
      Setting::find($id)->update([      
    
        'value1' => $formdata['name'],       
        'value2' => $formdata['code'],      
        'value3' => $formdata['link'],    
        'is_active' =>isset ($formdata["is_active"]) ? 1 : 0,
        
      ]);  
      return response()->json("ok");
    }
    }

    public function delsocial($id)
    {             
          $item = Setting::find($id);
          if (!( $item  === null)) {                   
            LocationSetting::where('setting_id',$id)->delete();
         Setting::find($id)->delete();         
          }              
          return redirect()->route('setting.getsocial');     
    }


    //header info
    public function getheadinfo()
    {
      
         
        $List = Setting::select( 'id','name1',
        'value1',
        'name2',
        'value2',
        'name3',
        'value3',
        'category',
        'dep',
        'sequence',
        'section',
        'location',
        'is_active',)->where('category','header-info')->get();
$phonerow= $List->where('dep','phone')->first();
 
$emailrow= $List->where('dep','email')->first();
 
        return view("admin.setting.headerinfo", [          
        "phonerow"=>$phonerow,
        "emailrow"=>$emailrow,
            
        ]);
    }

    public function updatephone(UpdatePhoneRequest $request)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {
      return response()->json($validator);
    } else { 
        $item = Setting::where('category','header-info')->where('dep','phone')->first();
      Setting::find( $item->id)->update([      
        'value1'=> $formdata['phone'],       
        'is_active'=>  isset ($formdata["is_active"]) ? 1 : 0, 
   
      ]);  
      return response()->json("ok");
    }
  }
    public function updateemail(UpdateEmailRequest $request)
    {
      $formdata = $request->all();
      $validator = Validator::make(
        $formdata,
        $request->rules(),
        $request->messages()
      );
      if ($validator->fails()) {
        return response()->json($validator);
      } else { 
          $item = Setting::where('category','header-info')->where('dep','email')->first();
        Setting::find( $item->id)->update([      
          'value1'=> $formdata['email'],       
          'is_active'=>  isset ($formdata["is_active-e"]) ? 1 : 0, 
     
        ]);  
        return response()->json("ok");
      }
    }

    //updatecontactemail
    public function updatecontactemail(UpdateContactEmailRequest $request)
    {
      $formdata = $request->all();
      $validator = Validator::make(
        $formdata,
        $request->rules(),
        $request->messages()
      );
      if ($validator->fails()) {
        return response()->json($validator);
      } else { 
          $item = Setting::where('category','site-info')->where('dep','contact_email')->first();
        Setting::find( $item->id)->update([      
          'value1'=> $formdata['contact_email'],      
        ]); 
        if (isset ($formdata['password'])) {
          $password = trim($formdata['password']);
          Setting::find( $item->id)->update([ 
            'value2' => $password,
          ]);
        }
        return response()->json("ok");
      }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeImage($file, $id,$column)
    {
      $imagemodel = Setting::find($id);
      $strgCtrlr = new StorageController();
      $path = $strgCtrlr->path['site'];
      $oldimage = $imagemodel[$column];
      $oldimagename = basename($oldimage);
    //  $oldimagepath = $path . '/' . $oldimagename;
      //save photo  
      if ($file !== null) {
        //  $filename= rand(10000, 99999).".".$file->getClientOriginalExtension();
        $ext=$file->getClientOriginalExtension();
          $filename= rand(10000, 99999).$id.".". $ext;
     //  $filename =  $imagemodel->code . $id . ".webp";
      //  $filename =  $imagemodel->code . $id .'.'.$ext;    
        Storage::delete("public/" .$path . '/' . $oldimagename); 
        $path = $file->storeAs($path ,$filename,'public');     
        Setting::find($id)->update([
            $column => $filename
        ]);    
      }
      return 1;
    }
}
