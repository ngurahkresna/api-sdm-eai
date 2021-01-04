<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEmployee;


class DataEmployeeController extends Controller
{
    //
    public function index()
    {
        $employee = DataEmployee::with('category','division', 'status')->get();
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'data' => $employee
        ], 200);
    }

    public function getEmployeeById($id)
    {
        $employee = DataEmployee::with('category','division', 'status')->where('employee_id', $id)->get();
        if (count($employee) > 0) { //mengecek apakah data kosong atau tidak
            $res['http status'] = "200";
            $res['status'] = "Success!";
            $res['message'] = "true";
            $res['values'] = $employee;
            return response($res);
        } else {
            $res['http status'] = "404";
            $res['status'] = "false";
            $res['message'] = "Data not found!";
            return response($res);
        }
    }

    public function createDataEmployee(request $request)
    {
        $employee = new DataEmployee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->gender = $request->gender;
        $employee->category_id = $request->category_id;
        $employee->division_id = $request->division_id;
        $employee->status_id = $request->status_id;
        $employee->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new employee data',
        ], 201);

    }

    public function updateDataEmployee(request $request, $id)
    {
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $address = $request->address;
        $phone = $request->phone;
        $gender = $request->gender;
        $category_id = $request->category_id;
        $division_id = $request->division_id;
        $status_id = $request->status_id;

        $employee = DataEmployee::find($id);
        $employee->first_name = $first_name;
        $employee->last_name = $last_name;
        $employee->address = $address;
        $employee->phone = $phone;
        $employee->gender = $gender;
        $employee->category_id = $category_id;
        $employee->division_id = $division_id;
        $employee->status_id = $status_id;
        $employee->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success update employee data',
        ], 201);

    }

    public function deleteDataEmployee($id)
    {
        $employee = DataEmployee::find($id);
        $employee->delete();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success delete employee data',
        ], 201);
    }
}
