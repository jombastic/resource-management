<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homepage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Setup the validator
        $rules = [
            'title' => 'required',
            'resourceType' => ['required', Rule::in(['HTML Snippet', 'PDF Download', 'Link'])],
            'snippetDescription' => ($request->input('resourceType') == 'HTML Snippet' ? 'required' : ''),
            'htmlSnippet' => ($request->input('resourceType') == 'HTML Snippet' ? 'required' : ''),
            'pdfFile' => ($request->input('resourceType') == 'PDF Download' ? 'required|file|mimetypes:application/pdf' : ''),
            'link' => ($request->input('resourceType') == 'Link' ? 'required|url' : ''),
            'openLinkInNewTab' => ($request->input('resourceType') == 'Link' ? Rule::in(['true', 'false']) : ''),
        ];
        $validator = Validator::make($request->all(), $rules);
        $validator->validate();

        return response()->json(array('success' => true), 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
