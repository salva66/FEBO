<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PlotsModel extends Model
{
    use HasFactory;
    protected $table = 'plots';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = PlotsModel::select('plots.*', 'users.name as created_by_name')
                    ->join('users', 'users.id', 'plots.created_by');
                    
                    if(!empty(Request::get('plot_id')))
                    {
                        $return = $return->where('plots.plot_id', 'like', '%'.Request::get('plot_id').'%');
                    }
                    if(!empty(Request::get('id')))
                    {
                        $return = $return->where('plots.id', 'like', '%'.Request::get('id').'%');
                    }

                    $return = $return->where('plots.is_delete','=',0)
                    ->orderBy('plots.id', 'desc')
                    ->paginate(20);
        return $return;
    }
}
