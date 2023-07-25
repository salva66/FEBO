<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class StaffController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStaff();
        $data['header_title'] = "Staff List";
        return view('hr.staff.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Staff";
        return view('hr.staff.add', $data);
    }

    public function insert(Request $request)
    {
        $staff = new User;
        $staff->f_name = trim($request->f_name);
        $staff->m_name = trim($request->m_name);
        $staff->l_name = trim($request->l_name);
        $staff->other_name = trim($request->other_name);
        $staff->gender = trim($request->gender);
        if(!empty($request->dob))
        {
            $staff->dob = trim($request->dob);
        }
        $staff->email = trim($request->email);
        $staff->phone_number = trim($request->phone_number);
        $staff->address = trim($request->address);
        $staff->docs = trim($request->docs);
        $staff->photo = trim($request->photo);
        $staff->staff_status = trim($request->staff_status);
        $staff->save();

        return redirect('hr/staff/list')->with('sucess', "Student Successfully Created");
    }
    
}
