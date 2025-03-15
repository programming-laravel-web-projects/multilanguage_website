<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Http\Requests\Category\UpdateMenuRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function editmenu($id)
    {
        $item = Category::with([
            'mediaposts' => function ($q) use ($id) {
                $q->with('mediastore');
            }
        ])->find($id);
        $lang_list = Language::orderByDesc('is_default')->with(
            [
                'langposts' => function ($q) use ($id) {
                    $q->where('category_id', $id);
                }
            ]
        )->get();
        //
        //   return $item;
        return view("admin.design.section.menu.edit", ["item" => $item, 'lang_list' => $lang_list]);
    }

    public function updatemenu(UpdateMenuRequest $request,$id)
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
       // check if slug exist
       //run first time only
        $tmpslug="";
        if ($formdata["slug"] == "" || empty($formdata["slug"])) {
            $tmpslug = $formdata["title"];
        } else {
            $tmpslug = $formdata["slug"];
        }
        $promodel=Category::where('slug', $tmpslug )->whereNot('id',$id)->first();
        if (!is_null($promodel)) {
            // error
           return response()->json([
             "errors" =>  ["slug" => [__('messages.this field exist',[],'en')]]          
           ], 422);      
        //end run
         } else
        {
 
 
   Category::find($id)->update([
     //'user_name'=>$formdata['user_name'],
    // 'title' => $formdata['title'],
    'meta_key' =>isset ($formdata['metakey']) ? $formdata['metakey'] : '',  
    'slug' =>Str::slug($tmpslug),   
     'status' => isset ($formdata["status"]) ? 1 : 0,  
     'update_user_id'=>   Auth::user()->id, 
   ]);

   return response()->json("ok");
         }
   
    }
    }

    public function getcatbyparent($id)
    {
      //  $strgCtrlr = new StorageController(); 
        //$path= $strgCtrlr->SitePath('image');
        //etfootersections
      
//temp
          $item = Category::with('sons')->find($id);       
              
         return view("admin.design.section.menu.submenu.show", [          
         "mainitem"=>   $item,            
         ]);
      
     


        
    }

}
