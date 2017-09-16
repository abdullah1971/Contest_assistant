<?php

namespace App\Http\Controllers;

use App\ContestList;
use App\Editorial;
use App\JudgesInputOutput;
use App\JudgesSolution;
use App\ProblemSet;
use App\Solution;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function contestShow()
    {
    	$data = new ContestList;

        $data1= $data::all();

    	return view('studentContestList', compact('data1'));
    }


    public function contestDetails($id)
    {

    	$xyz = new ContestList;
        $data = $xyz::where('id',$id)->get();

        $problemSets = new ProblemSet;
        $problemSet = $problemSets::where('contest_id',$id)->get();

        $editorials = new Editorial;
        $editorial = $editorials::where('contest_id', $id)->get()->first();
    	
    	return view('studentContestDetails', compact('data', 'problemSet', 'editorial'));
    }


    public function problemDetails($id)
    {
    	$ProblemSet = new ProblemSet;

        $singleProblem = $ProblemSet::find($id);


        $solution = new Solution;
        $solutions = $solution::where('problem_sets_id', $id)->get();


        $judgesIO = new JudgesInputOutput;
        $judgesIOs = $judgesIO::where('problem_id', $id)->get()->first();
        // return $judgesIOs;

        $judgesSolution = new JudgesSolution;
        $judgesSolutions = $judgesSolution::where('problem_id', $id)->get()->first();


        return view('studentProblemDetails', compact('singleProblem', 'solutions', 'judgesIOs', 'judgesSolutions'));

    }
}
