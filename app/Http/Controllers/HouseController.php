<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

use function Termwind\render;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('house.house_index');
        return view("formMap.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('house.house_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        // dd($request);
        // dd($request->nom,
        // $request->ville,
        // $request->commune,
        // $request->quartier,
        // $request->avenue,
        // $request->numero);
        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:255',
            'ville' => 'required|max:255',
            'commune' => 'required|max:255',
            'quartier' => 'required|max:255',
            'avenue' => 'required|max:255',
            'numero' => 'required|integer',
        ]);
 
        if ($validator->fails()) {
            return redirect('house.house_form')
                        ->withErrors($validator)
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();
        // dd(Auth::user()->id);
        $house=House::create([
            'name'=> $validated['nom'],
            'adresse'=> $validated['ville'].'/'.$validated['commune'].'/'.$validated['quartier'].'/'.$validated['avenue'].'/'.$validated['numero'],
            'user_id'=>Auth::user()->id,
            ]
        );
        $house->save();
        return redirect(route('house_index'));
        // dd($house);
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
}
