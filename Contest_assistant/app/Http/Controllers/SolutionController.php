<?php

namespace App\Http\Controllers;

use App\Solution;
use App\JudgesInputOutput;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function update_page($id, $number, $no)
    {
    	
    	$solutionInstance = Solution::find($no);

    	// return $solutionInstance;

    	return view('updateSolution', compact('solutionInstance'));
    }


    public function deleteSolution($id, $number, $no)
    {
    	
    	$solutionInstance = Solution::find($no);

    	$solutionInstance->delete();

    	return redirect()->route('problem.show', ['problem' => $number]);
    }


    public function judgesIO($id, $number)
    {
        
        return view('addJudgesInputOutput', compact('id', 'number'));
    }

    public function judgesIOStore(Request $request, $id, $number)
    {
        

        // return $request->all();

        $judgesIOInstance = new JudgesInputOutput;

        $judgesIOInstance->contest_id = $request->contest_id;
        $judgesIOInstance->problem_id = $request->problem_id;
        $judgesIOInstance->input_output_body = $request->input_output_body;

        $judgesIOInstance->save();

        return redirect()->route('problem.show', ['problem' => $number]);



    }


    public function judgesIOUpdate($id, $number, $no)
    {
        $judgesIOInstance = JudgesInputOutput::find($no);

        return view('updateJudgesInputOutput', compact('judgesIOInstance', 'id', 'number', 'no'));
    }


    public function judgesIOUpdateStore(Request $request, $id, $number, $no)
    {
        
        // return $request->all();

        $judgesIOInstance = JudgesInputOutput::find($no);

        $judgesIOInstance->input_output_body = $request->input_output_body;

        $judgesIOInstance->save();

        return redirect()->route('problem.show', ['problem' => $number]);
    }
}
