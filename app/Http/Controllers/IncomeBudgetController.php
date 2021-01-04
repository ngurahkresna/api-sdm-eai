<?php

namespace App\Http\Controllers;

use App\Models\IncomeBudget;
use Illuminate\Http\Request;

class IncomeBudgetController extends Controller
{
    //
    public function index()
    {
        $income = IncomeBudget::all();
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'data' => $income
        ], 200);
    }

    public function getIncomeBudgetById($id)
    {
        $income = IncomeBudget::where('income_budget_id', $id)->get();
        if (count($income) > 0) { //mengecek apakah data kosong atau tidak
            $res['http status'] = "200";
            $res['status'] = "Success!";
            $res['message'] = "true";
            $res['values'] = $income;
            return response($res);
        } else {
            $res['http status'] = "404";
            $res['status'] = "false";
            $res['message'] = "Data not found!";
            return response($res);
        }
    }

    public function createDataIncomeBudget(request $request)
    {
        $income = new IncomeBudget;
        $income->sender_name = $request->sender_name;
        $income->income_budget = $request->income_budget;
        $income->intended_for = $request->intended_for;
        $income->date = $request->date;
        $income->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new income budget data',
        ], 201);

    }

    public function updateDataIncomeBudget(request $request, $id)
    {
        $sender_name = $request->sender_name;
        $income_budget = $request->income_budget;
        $intended_for = $request->intended_for;
        $date = $request->date;

        $data_income = IncomeBudget::find($id);
        $data_income->sender_name = $sender_name;
        $data_income->income_budget = $income_budget;
        $data_income->intended_for = $intended_for;
        $data_income->date = $date;
        $data_income->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success update income budget data',
        ], 201);

    }

    public function deleteDataIncomeBudget($id)
    {
        $data_income = IncomeBudget::find($id);
        $data_income->delete();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success delete income budget data',
        ], 201);

    }
}
