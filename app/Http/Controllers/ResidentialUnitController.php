<?php

namespace App\Http\Controllers;

use App\Models\ResidentialUnit;
use Illuminate\Http\Request;

class ResidentialUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentialunits = ResidentialUnit::all();
        return view('residentialunits.index', compact('residentialunits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('residentialunits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'block_number' => 'required',
            'unit_number' => 'required',
            'occupant_name' => 'required',
            'occupant_contact' => 'required',
        ]);
        ResidentialUnit::create($request->all());

        return redirect()->route('residentialunits.index')->with('success', 'Residential unit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResidentialUnit  $residentialUnit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(['ResidentialUnit' => $residentialUnit]);
        $residentialUnit = ResidentialUnit::findOrFail($id);
        // dd($residentialUnit);
        return view('residentialunits.show', compact('residentialUnit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResidentialUnit  $residentialUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $residentialUnit = ResidentialUnit::findOrFail($id);
        // dd($residentialUnit);
        return view('residentialunits.edit', compact('residentialUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResidentialUnit  $residentialUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'block_number' => 'required',
            'unit_number' => 'required',
            'occupant_name' => 'required',
            'occupant_contact' => 'required',
        ]);

        $residentialUnit = ResidentialUnit::findOrFail($id);

        $residentialUnit->update($request->all());


        return redirect()->route('residentialunits.index')->with('success', 'Residential unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidentialUnit  $residentialUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $residentialUnit = ResidentialUnit::findOrFail($id);
        $residentialUnit->delete();

        return redirect()->route('residentialunits.index')
            ->with('success', 'Residential unit deleted successfully');
    }
}
