<?php

namespace App\Http\Controllers;

use App\ContestList;
use App\Editorial;
use App\JudgesInputOutput;
use App\JudgesSolution;
use App\ProblemSet;
use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class problemController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = new ProblemSet;

        $new = $show::all();
            

        return view('pdfFiles',compact('new'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // first delete all the problem already exists
        $deleteProblem = new ProblemSet;

        $deleteProblems = $deleteProblem::where('contest_id', $request->contest_number)->get();
        foreach ($deleteProblems as $singleProblem) {
            
            $deleteProblem = new ProblemSet;

            $id = $singleProblem->id;

            $getProblemInstance = $deleteProblem::find($id);

            $getProblemInstance->delete();

            
        }


        $problem_set = new ProblemSet;

        $problemNames = $request->problem_name;
        $problemPdf = $request->problem_pdf;

        $len = count($problemNames);

        /*
            
            need to validate. need to see the validation rule.
            i didn't because i have not enough time now.
            best of luck :D

        */

        // $this->validate($request, [

        //     'problem_name' => 'required|unique:problem_sets|max:255',
        //     'problem_pdf' => 'required|mimes:pdf|max:10000',
        // ]);


        $i = 0;

        foreach ($problemPdf as $singlePdf) {

            $problem_set = new ProblemSet;
            
            $problem_set->contest_id = $request->contest_number;

            $problem_set->problem_name = $problemNames[$i];



            if($request->hasFile('problem_pdf.'.$i)){

                // echo "string<br>";
                $temp = 'problem_pdf.'.$i;
                // echo $temp."<br>";

                $fileName = $singlePdf->getClientOriginalName();

                // echo "$fileName<br>";

                $path = $singlePdf->storeAs('public/problem_sets', $fileName);

                $problem_set->pdf_file_path = '/storage/problem_sets/'.$fileName;
            }

            $i++;

            $problem_set->save();
        }

        return redirect()->route('contest.show',['id' => $request->contest_number]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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


        return view('singleProblemShow',compact(['singleProblem', 'solutions', 'judgesIOs', 'judgesSolutions']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
    public function uploadProblem($id, $number)
    {
        $problemNumber = $number;

        //return $number;

        return view('problems', compact(['id','problemNumber']));
    }


    public function addSolution($id)
    {
        
        return view('addSolution',compact('id'));
    }


    public function storeSolution(Request $request,$id)
    {
        

        // return $request->all();

        $solutions = new Solution;

        $solutions->problem_sets_id = $id;
        $solutions->author = $request->solution_author;
        $solutions->solution = $request->problem_solution;

        $solutions->save();

        return redirect()->route('problem.show',['id' =>$id]);
    }





//     public function pdfShow()
//     {
//        // $filename = 'Chapter 19_Public Key Algorithm';
//         $path = storage::url('Chapter 19_Public Key Algorithm');

//         return view('pdfFiles',compact('path'));
//     }


    public function addAdditionalProblem($id)
    {

        $problemSetInstancae = new ProblemSet;

        $numberOfProblemsAlreadyInserted = $problemSetInstancae::where('contest_id', $id)->get();

        // return $numberOfProblemsAlreadyInserted;

        $problemNumbers = $numberOfProblemsAlreadyInserted->count();


        // return $problemNumbers;
        
        return view('addAdditionalProblemShow',compact('id', 'problemNumbers'));



    }


    public function addAdditionalProblemStore(Request $request)
    {
        
        // return $request->all();

        $problemSetInstancae = new ProblemSet;

        $problemSetInstancae->contest_id = $request->contest_number;
        $problemSetInstancae->problem_name = $request->problem_name;

        if($request->hasFile('problem_pdf')){

                
                $temp = 'problem_pdf';
                

                $fileName = $request->problem_pdf->getClientOriginalName();

                

                $path = $request->problem_pdf->storeAs('public/problem_sets', $fileName);

                $problemSetInstancae->pdf_file_path = '/storage/problem_sets/'.$fileName;
        }

        $problemSetInstancae->save();


        $contestListInstance = ContestList::find($request->contest_number);

        // return $contestListInstance->numberofproblems;
        $request->number_of_problems_has_been_added++;

        if($contestListInstance->numberofproblems < $request->number_of_problems_has_been_added){

            // retrun "dkfsd";

            $contestListInstance->numberofproblems = $request->number_of_problems_has_been_added;
        }

        $contestListInstance->save();




        return redirect()->route('contest.show', ['id' => $request->contest_number]);

    }



    public function singleProblemUpdate($id, $number)
    {
        
        // return $id;
        // return $number;
        $problemSetInstancae = ProblemSet::find($number);
        $problemSetList = ProblemSet::where('contest_id', $id)->get();

        // get the problem number according to contest problem set

        // return $problemSetList;
        
        $count = 1;

        

        foreach ($problemSetList as $singleProblem) {
            
            if($singleProblem->id == $number)
                break;

            $count++;
        }

        $problemNumber = $count;

        return view('singleProblemUpdate', compact('problemNumber', 'problemSetInstancae'));

        // return $count;

    }


    public function singleProblemUpdateStore(Request $request,$id, $number)
    {
        

        // return $request->all();
        // return $number;

        $problemSetInstancae = ProblemSet::find($number);
        // return $problemSetInstancae;

        $problemSetInstancae->problem_name = $request->problem_name;
        // $problemSetInstancae->contest_id = $id;


        if($request->hasFile('problem_pdf')){

                
                $temp = 'problem_pdf';
                

                $fileName = $request->problem_pdf->getClientOriginalName();

                

                $path = $request->problem_pdf->storeAs('public/problem_sets', $fileName);

                $problemSetInstancae->pdf_file_path = '/storage/problem_sets/'.$fileName;
        }

        $problemSetInstancae->save();

        return redirect()->route('problem.show',['problem' => $number]);
    }


    public function singleProblemDelete(Request $request, $id, $number)
    {
        
        // return $request->all();

        $problemSetInstancae = ProblemSet::find($number);

        $problemSetInstancae->delete();

        return redirect()->route('contest.show',['contest' => $id]);
    }


    public function addEditorial($id)
    {
        
        return view('addEditorial', compact('id'));

    }


    public function addEditorialStore(Request $request)
    {
        
        // return $request->all();

        $editorialInstance = new Editorial;

        $editorialInstance->contest_id = $request->contest_id;
        $editorialInstance->editorial_body = $request->editorial_body;

        $editorialInstance->save();

        return redirect()->route('contest.show', ['contest' => $request->contest_id]);

    }


    public function addEditorialUpdate($id)
    {

        $editorialInstance = Editorial::where('contest_id', $id)->get()->first();

        // return $editorialInstance;
        
        return view('updateEditorial', compact('editorialInstance', 'id'));
    }


    public function addEditorialUpdateStore(Request $request, $id)
    {
        
        // return $request->all(); 

        $editorialInstance = Editorial::find($request->editorial_id);

        $editorialInstance->editorial_body = $request->editorial_body;

        $editorialInstance->save();

        return redirect()->route('contest.show', ['contest' => $request->contest_id]);
    }


    public function addJudgesSolution($id, $number)
    {
        
        return view('addJudgesSolution', compact('id', 'number'));
    }


    public function addJudgesSolutionStore(Request $request)
    {
        
        // return $request->all();

        $judgesSolutionInstance = new JudgesSolution;

        $judgesSolutionInstance->contest_id = $request->contest_id;
        $judgesSolutionInstance->problem_id = $request->problem_id;
        $judgesSolutionInstance->solution_body = $request->judges_solution_body;

        $judgesSolutionInstance->save();

        return redirect()->route('problem.show', ['id' => $request->problem_id]);
    }


    public function updateJudgesSolution($id, $number, $no)
    {

        $judgesSolutionInstance = JudgesSolution::find($no);

        // return $judgesSolutionInstance;
        
        return view('updateJudgesSolution', compact('id', 'number', 'no', 'judgesSolutionInstance'));
    }


    public function updateJudgesSolutionStore(Request $request, $id, $number, $no)
    {
        
        $judgesSolutionInstance = JudgesSolution::find($no);

        $judgesSolutionInstance->solution_body = $request->judges_solution_body;

        $judgesSolutionInstance->save();

        return redirect()->route('problem.show', ['problem' => $number]);
    }

 }
