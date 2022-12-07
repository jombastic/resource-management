<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Repositories\ResourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(ResourceRepository $resourceRepository) 
    {
        $this->resourceRepository = $resourceRepository;
    }
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
            'url' => ($request->input('resourceType') == 'Link' ? 'required|url' : ''),
        ];
        $data = $request->all();
        $validator = Validator::make($data, $rules);
        $validator->validate();

        $this->store_file($request->file('pdfFile'));
        $this->resourceRepository->storeResources($data);

        $request->session()->flash('success', 'Resource was saved successfully!');

        return response()->json(array('success' => true), 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = $this->resourceRepository->getResource($id);
        if (!$resource) return redirect()->route('home')->with('error', 'The resource does not exist!');

        // dd($resource);
        return view('admin', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Setup the validator
        $rules = [
            'id' => 'required|integer|numeric',
            'title' => 'required',
            'resourceType' => ['required', Rule::in(['HTML Snippet', 'PDF Download', 'Link'])],
            'snippetDescription' => ($request->input('resourceType') == 'HTML Snippet' ? 'required' : ''),
            'htmlSnippet' => ($request->input('resourceType') == 'HTML Snippet' ? 'required' : ''),
            'fileName' => ($request->input('resourceType') == 'PDF Download' ? 'required' : ''),
            'pdfFile' => ($request->input('resourceType') == 'PDF Download' ? 'file|mimetypes:application/pdf' : ''),
            'url' => ($request->input('resourceType') == 'Link' ? 'required|url' : ''),
        ];
        $data = $request->all();
        $validator = Validator::make($data, $rules);
        $validator->validate();

        $this->store_file($request->file('pdfFile'));

        $this->resourceRepository->editResource($data);

        $request->session()->flash('success', 'Resource was updated successfully!');

        return response()->json(array('success' => true), 200);
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

    private function store_file($file)
    {
        if ($file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs('public', $filename);
            $data['pdfFile'] = $filename;
        }
    }
}
