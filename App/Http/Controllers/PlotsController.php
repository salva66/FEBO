<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\PlotsModel;

class PlotsController extends Controller
{
    public function list()
    {
        $data['getRecord'] = PlotsModel::getRecord();
        $data['header_title'] = "Plots List";
        return view('management.plots.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Plot";
        return view('management.plots.add', $data);
    }

    public function insert(Request $request)
    {
        $save = new PlotsModel;
        $save->plot_id = trim($request->plot_id);
        $save->plot_size = trim($request->plot_size);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('management/plots/list')->with('Sucess', "Plot successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = PlotsModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Plot";
            return view('management.plots.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    public function update($id, Request $request)
    {
        $save = PlotsModel::getSingle($id);
        $save->plot_id = trim($request->plot_id);
        $save->plot_size = trim($request->plot_size);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->updated_by = Auth::user()->id;
        $save->save();

        return redirect('management/plots/list')->with('Sucess', "Plot successfully Updated");
    }

    public function delete($id)
    {
        $save = PlotsModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('management/plots/list')->with('Sucess', "Plot successfully Deleted");
    }
}
