<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\ResidentialUnit;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DONT NEED TO SHOW ALL VISITORS YET
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('visitors.create');
    }

    public function search()
    {
        //
        return view('visitors.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // TODO: -> 
        // OK - LOOK FOR VISITOR IF EXISTS OTHERWISE CREATE NEW 
        // OK - LOOK FOR UNIT IF EXISTS OTHERWISE DISPLAY UNIT DOESNT EXIST
        // ADD A NEW VISIT OBJECT TO THE VISIOR OBJECT AND RES UNIT
        // CHECK IF THERE ARE ALR 8 VISITORS AT THIS UNIT
        // IF CURRENT USER IS ALR SIGNED IN, PROMPT BUT DONT BLOCK
        // SHOW SUCCESS MESSAGE AND REDIRECT TO FORM
        // dd($request->NRICLast3Digits);
        $request->validate([
            'visitor_name' => 'required',
            'NRICLast3Digits' => 'required',
            'visitor_contact' => 'required',
            'unit_number' => 'required',
            'block_number' => 'required',
        ]);

        // $column = 'NRICLast3Digits';
        $existingVisitor = Visitor::where('NRICLast3Digits', '=', $request->NRICLast3Digits)->first();
        $currentResidentialUnit = ResidentialUnit::where('unit_number', '=', $request->unit_number)->where('block_number', '=', $request->block_number)->first();
        // dd($currentResidentialUnit->id);

        if (!$currentResidentialUnit) {
            return redirect()->back()->with('success', 'This residence does not exist')->withInput();
        } else {
            if ($currentResidentialUnit->visits()->count() > 7) {
                return redirect()->back()->with('success', 'There are already 8 visitors');
            }

            if (!$existingVisitor) { // REG NEW VISITOR AND COME IN

                $newVisitor = new Visitor([
                    'visitor_name' => $request->visitor_name,
                    'visitor_contact' => $request->visitor_contact,
                    'NRICLast3Digits' => $request->NRICLast3Digits,
                ]);
                $newVisitor->save();
                $newVisit = new Visit(
                    [
                        'residential_unit_id' => $currentResidentialUnit->id,
                        'visitor_id' => $newVisitor->id
                    ]
                );
                $newVisitor->visits()->save($newVisit);
                $currentResidentialUnit->visits()->save($newVisit);

                return redirect()->back()
                    ->with('success', 'Entry registered with a new visitor');
            } else { // PREV VISITOR VISITING AGAIN

                //CHECK IF VISITOR HAS NOT LOGGED OUT BEFORE OR DOUBLE ENTRY

                $newVisit = new Visit(
                    [
                        'residential_unit_id' => $currentResidentialUnit->id,
                        'visitor_id' => $existingVisitor->id
                    ]
                );

                $existingVisitor->visits()->save($newVisit);
                $currentResidentialUnit->visits()->save($newVisit);
                return redirect()->back()
                    ->with('success', 'Entry registered with an existing visitor');
            }
        }

        // dd($currentUnit);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
