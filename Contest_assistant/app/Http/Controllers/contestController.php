<?php

namespace App\Http\Controllers;

use App\ContestList;
use App\ProblemSet;
use App\Editorial;
use Illuminate\Http\Request;

class contestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new ContestList;

        $data1= $data::all();
        return view('lists',compact('data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('addcontest');

            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new ContestList;

        $data->name = $request->name;
        //$data->numberofparticipates = $request->numberofparticipates;
        $data->Date = $request->Date;
        $data->numberofproblems = $request->numberofproblems;

        $data->save();


        return redirect()->route('contest.index');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $xyz = new ContestList;
        $data = $xyz::where('id',$id)->get();

        $problemSets = new ProblemSet;
        $problemSet = $problemSets::where('contest_id',$id)->get();

        $editorials = new Editorial;
        $editorial = $editorials::where('contest_id', $id)->get()->first();

        

        // dd($problemSet);

        // return $problemSet;


       return view('show',compact(['data','problemSet', 'editorial']));    

        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $abc = new ContestList;

        $data= $abc::find($id);

        return view('edits',compact('data'));

        // return "edit $id";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $xyz = new ContestList;

        $data = $xyz::find($id);

        $data->name = $request->name;
        // $data->numberofparticipates = $request->numberofparticipates;
        $data->Date = $request->Date;
        $data->numberofproblems = $request->numberofproblems;

        $data->save();

        //$data = $xyz::all();

        return redirect()->route('contest.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contest = new ContestList;

        $deleteContest = $contest::find($id);

        $deleteContest->delete();

        return redirect()->route('contest.index');
    }


    
}
