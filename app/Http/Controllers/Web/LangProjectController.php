<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\LangProject;
use App\Http\Requests\LangProject\UpdateLangProjectRequest;
use Illuminate\Support\Facades\Validator;

class LangProjectController extends Controller
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
    public function update(UpdateLangProjectRequest $request,$id)
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
           //$id is project_id
           /*
'project_id',
        'lang_id',
        'title_trans',
        'content_trans',
           */
          $lang_id=  $formdata['lang_id'];
          $langProject = LangProject::updateOrCreate(
            ['project_id' => $id, 'lang_id' =>  $lang_id],
            [
            'title_trans' =>$formdata['title_trans'], 
            'content_trans' =>$formdata['content_trans']
            ]
        );
       return response()->json("ok");
             }
       
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
