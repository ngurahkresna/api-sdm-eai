<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presence;

class PrecenseController extends Controller
{
    //
    public function index()
    {
        $presence = Presence::with("employee")->get();
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Success get all data',
            'data' => $presence
        ], 200);
    }

    public function getPresenceById($id)
    {
        $presence = Presence::with('employee')->where('presence_id', $id)->get();
        if (count($presence) > 0) { //mengecek apakah data kosong atau tidak
            $res['http status'] = "200";
            $res['status'] = "Success!";
            $res['message'] = "true";
            $res['values'] = $presence;
            return response($res);
        } else {
            $res['http status'] = "404";
            $res['status'] = "false";
            $res['message'] = "Data not found!";
            return response($res);
        }
    }

    public function createDataPresence(request $request)
    {
        $presence = new Presence;
        $presence->employee_id = $request->employee_id;
        $presence->total_attandance = $request->total_attandance;
        $presence->total_absen = $request->total_absen;
        $presence->total_overtime = $request->total_overtime;
        $presence->presence_date = $request->presence_date;
        $presence->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new presence data',
        ], 201);

    }

    public function updateDataPresence(request $request, $id)
    {
        $employee_id = $request->employee_id;
        $total_attandance = $request->total_attandance;
        $total_absence = $request->total_absen;
        $total_overtime = $request->total_overtime;
        $presence_date = $request->presence_date;

        $presence = Presence::find($id);
        $presence->employee_id = $employee_id;
        $presence->total_attandance = $total_attandance;
        $presence->total_absen = $total_absence;
        $presence->total_overtime = $total_overtime;
        $presence->presence_date = $presence_date;
        $presence->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success update presence data',
        ], 201);
    }

    public function deleteDataPresence($id)
    {
        $presence = Presence::find($id);
        $presence->delete();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success delete presence data',
        ], 201);
    }
}
