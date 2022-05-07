<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Symptom;
use App\Models\UserDiagnosis;

class DiagnoseController extends Controller
{
    public function index()
    {
        $symptoms = Symptom::get();
        return view('diagnoses', compact('symptoms'));
    }

    public function getResults()
    {
        return view('diagnoses-results',
            [
                'results' => auth()->user()->diagnoses()->latest()->get()
            ]);
    }


    public function getDiagnoses($diagnoses, $symptoms) {
        $result = [];
        $diagnosesId = [];
        foreach ($diagnoses as $diagnosis) {
            $flag = true;
            foreach ($symptoms as $s) {
                $d = $diagnosis->symptoms->pluck('id');

                if (!$d->contains($s->id)) {
                    $flag = false;
                }
            }

            if ($flag) {
                $result[] = $diagnosis; // [diagnoses]
                $diagnosesId[] = $diagnosis->id; // [1]
            }
        }

        return [$result, $diagnosesId];
    }

    public function attachDiagnosesBaseOnIds($diagnosesId){
        foreach ($diagnosesId as $id) {
            UserDiagnosis::create([
                'user_id' => auth()->id(),
                'diagnosis_id' => $id,
            ]);
        }
    }



    public function process()
    {
        // validate the symptomps  60 - 63
        $data = request()->validate([
            'symptoms' => 'required',
        ]);



        $symptoms = Symptom::find($data['symptoms']); // get all checked symptoms from the database


        $diagnoses = Diagnosis::with(['symptoms', 'medicines'])->get(); // get all checked diagnoses from the database



        [$result, $diagnosesId] = $this->getDiagnoses($diagnoses, $symptoms); // filter all dianoses base of the given symptoms



        $this->attachDiagnosesBaseOnIds($diagnosesId); // generated diagnoses  attach to the user,


        return view('diagnoses-result', ['symtomps' => $symptoms, 'diagnoses' => $result]);
    }
}
