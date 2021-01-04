<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClaimReimbursement;

class ClaimReimbursementController extends Controller
{
    //
    public function index(){
        $claimreimbursement = ClaimReimbursement::with("employee")->get();
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'data' => $claimreimbursement
        ], 200);
}

    public function getClaimReimbursementById($id){
        $claim = ClaimReimbursement::with("employee")->where('claim_id', $id)->get();
        if(count($claim) > 0){ //mengecek apakah data kosong atau tidak
            $res['http status'] = "200";
            $res['status'] = "Success!";
            $res['message'] = "true";
            $res['values'] = $claim;
            return response($res);
        }
        else{
            $res['http status'] = "404";
            $res['status'] = "false";
            $res['message'] = "Data not found!";
            return response($res);
        }
    }


    public function createDataReimbursement(request $request){
        $claimreimbursement = new ClaimReimbursement;
        $claimreimbursement->employee_id = $request->employee_id;
        $claimreimbursement->title = $request->title;
        $claimreimbursement->description = $request->description;
        $claimreimbursement->proff_of_payment = $request->proff_of_payment;
        $claimreimbursement->date = $request->date;
        $claimreimbursement->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new claim reimbursement data',
        ], 201);

    }

    public function updateDataRimbursement(request $request, $id){
        $employee_id = $request->employee_id;
        $title = $request->title;
        $desc = $request->description;
        $proff_of_payment = $request->proff_of_payment;
        $date = $request->date;

        $reimbursement = ClaimReimbursement::find($id);
        $reimbursement->employee_id = $employee_id;
        $reimbursement->title = $title;
        $reimbursement->description = $desc;
        $reimbursement->proff_of_payment = $proff_of_payment;
        $reimbursement->date = $date;
        $reimbursement->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success update claim reimbursement data',
        ], 201);
    }

    public function deleteDataReimbursement($id){
        $reimbursement = ClaimReimbursement::find($id);
        $reimbursement->delete();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success delete claim reimbursement data',
        ], 201);
    }

}
