<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudModel;
use DB;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $data=CrudModel::all();

        // $data=CrudModel::get();

        $data=DB::table('registration')->get();
        return view('index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->name);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required|confirmed',
        ]);

        // DB::table('registration')->insert([
        //     'name' =>$request->name,
        //     'email' =>$request->email,
        //     'password' =>$request->password,
        // ]);

        CrudModel::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password,
        ]);

       return back()->with('success','data created successfully');


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
        $data=CrudModel::find($id);
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required|confirmed',
        ]);
        $record = CrudModel::find($id);
                if ($record) {
                    $record->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => $request->password,
                    ]);
                }
       return back()->with('success','data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $record = CrudModel::find($id);
        $record->delete();
        return redirect()->route('index')->with('success','Product deleted successfully');
    }
}
