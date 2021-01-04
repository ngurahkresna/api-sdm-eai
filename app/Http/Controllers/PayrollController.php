<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DataEmployee;
use App\Models\Presence;
use Illuminate\Http\Request;
use App\Models\Payroll;

class PayrollController extends Controller
{
    //
    public function index()
    {
        $payroll = Payroll::with("employee", "presence", "category")->get();
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'data' => $payroll
        ], 200);
    }

    public function getPayrollById($id)
    {
        $payroll = Payroll::with('employee')->where('payroll_id', $id)->get();
        if (count($payroll) > 0) { //mengecek apakah data kosong atau tidak
            $res['http status'] = "200";
            $res['status'] = "Success!";
            $res['message'] = "true";
            $res['values'] = $payroll;
            return response($res);
        } else {
            $res['http status'] = "404";
            $res['status'] = "false";
            $res['message'] = "Data not found!";
            return response($res);
        }
    }

    public function countSallary(request $request)
    {
        $id = $request->employee_id;

        $employee = DataEmployee::where('employee_id', $id)->first();
        $employee_category = $employee->category_id;

        $precense = Presence::where('employee_id', $id)->first();
        $precense_id = $precense->presence_id;
        $total_attandance = $precense->total_attandance;
        $total_overtime = $precense->total_overtime;

        $category = Category::where('category_id', $employee_category)->first();
        $category_id = $category->category_id;
        $salary_attandance = $category->category_salary;
        $salary_overtime = $category->overtime_salary;

        $total_salary = ($total_attandance * $salary_attandance) + ($total_overtime * $salary_overtime);

        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'presence_id' => $precense_id,
            'category_id' => $category_id,
            'total_salary' => $total_salary,
            'employee' => $employee,
            'category' => $category

        ], 200);

    }

    public function createDataPayroll(request $request)
    {
        $payroll = new Payroll;
        $payroll->employee_id = $request->employee_id;
        $payroll->presence_id = $request->presence_id;
        $payroll->category_id = $request->category_id;
        $payroll->sallary = $request->sallary;
        $payroll->report_date = $request->report_date;
        $payroll->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new payroll data',
        ], 201);

    }

    public function updateDataPayroll(request $request, $id)
    {
        $employee_id = $request->employee_id;
        $presence_id = $request->presence_id;
        $category_id = $request->category_id;
        $sallary = $request->sallary;
        $report_date = $request->report_date;

        $payroll = Payroll::find($id);
        $payroll->employee_id = $employee_id;
        $payroll->presence_id = $presence_id;
        $payroll->category_id = $category_id;
        $payroll->sallary = $sallary;
        $payroll->report_date = $report_date;
        $payroll->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success update payroll data',
        ], 201);
    }

    public function deleteDataPayroll($id)
    {
        $payroll = Payroll::find($id);
        $payroll->delete();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success delete payroll data',
        ], 201);
    }
}
