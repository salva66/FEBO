<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ProjectsModel extends Model
{
    use HasFactory;
    protected $table = 'projects';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = ProjectsModel::select('projects.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'projects.created_by')
                    ->where('projects.is_delete', '=', 0);
                    
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('projects.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('id')))
                    {
                        $return = $return->where('projects.id', 'like', '%'.Request::get('id').'%');
                    }

                    $return = $return->orderBy('projects.id', 'desc')
                    ->paginate(20);
        return $return;
    }
}
