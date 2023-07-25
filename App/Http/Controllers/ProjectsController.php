<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ProjectsModel;

class ProjectsController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ProjectsModel::getRecord();
        $data['header_title'] = "Projects List";
        return view('site&project.projects.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Project";
        return view('site&project.projects.add', $data);
    }
    
    public function insert(Request $request)
    {
        $save = new ProjectsModel;
        $save->id = $request->id;
        $save->name = $request->name;
        $save->region = $request->region;
        $save->district = $request->district;
        $save->ward_village = $request->ward_village;
        $save->street = $request->street;
        $save->owners_name = $request->owners_name;
        $save->ownership_type = $request->ownership_type;
        $save->brokers_name = $request->brokers_name;
        $save->brokers_phone = $request->brokers_phone;
        $save->brokers_email = $request->brokers_email;
        $save->price = $request->price;
        $save->price_negotiability = $request->price_negotiability;
        $save->plot_size = $request->plot_size;
        $save->neighbor1_name = $request->neighbor1_name;
        $save->neighbor1_phone = $request->neighbor1_phone;
        $save->neighbor1_email = $request->neighbor1_email;
        $save->neighbor2_name = $request->neighbor2_name;
        $save->neighbor2_phone = $request->neighbor2_phone;
        $save->neighbor2_email = $request->neighbor2_email;
        $save->neighbor3_name = $request->neighbor3_name;
        $save->neighbor3_phone = $request->neighbor3_phone;
        $save->neighbor3_email = $request->neighbor3_email;
        $save->near_physical = $request->near_physical;
        $save->info_localgvt = $request->info_localgvt;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('site&project/projects/list')->with('sucess', "Project Sucessfully Created");

    }

    public function edit($id)
    {
        $data['getRecord'] = ProjectsModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Project";
            return view('site&project.projects.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    public function update($id, Request $request)
    {
        $save = ProjectsModel::getSingle($id);
        $save->id = $request->id;
        $save->name = $request->name;
        $save->region = $request->region;
        $save->district = $request->district;
        $save->ward_village = $request->ward_village;
        $save->street = $request->street;
        $save->owners_name = $request->owners_name;
        $save->ownership_type = $request->ownership_type;
        $save->brokers_name = $request->brokers_name;
        $save->brokers_phone = $request->brokers_phone;
        $save->brokers_email = $request->brokers_email;
        $save->price = $request->price;
        $save->price_negotiability = $request->price_negotiability;
        $save->plot_size = $request->plot_size;
        $save->neighbor1_name = $request->neighbor1_name;
        $save->neighbor1_phone = $request->neighbor1_phone;
        $save->neighbor1_email = $request->neighbor1_email;
        $save->neighbor2_name = $request->neighbor2_name;
        $save->neighbor2_phone = $request->neighbor2_phone;
        $save->neighbor2_email = $request->neighbor2_email;
        $save->neighbor3_name = $request->neighbor3_name;
        $save->neighbor3_phone = $request->neighbor3_phone;
        $save->neighbor3_email = $request->neighbor3_email;
        $save->near_physical = $request->near_physical;
        $save->info_localgvt = $request->info_localgvt;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('site&project/projects/list')->with('sucess', "Project Sucessfully Updated");
    }

    public function delete($id)
    {
        $save = ProjectsModel::getSingle($id); 
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('sucess', "Project Sucessfully Deleted");
    }
}
