<?php

namespace App\Http\Controllers\Kogcms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function changeBoolean(Request $request)
    {
        $res = DB::table($request->table)->select($request->field)->whereId($request->id)->first();
        DB::table($request->table)->whereId($request->id)->update([$request->field => abs($res->active - 1)]);
        return response()->json([
            'class' => $res->active ? 'fa-circle-o' : 'fa-check-circle-o',
            'success' => true
        ]);
    }

    public function getBooleanInput($model)
    {
        $class = $model->active ? 'fa-check-circle-o' : 'fa-circle-o';
        return '<div data-href="' . route('itemcms.change-boolean', [
                'table' => $model->getTable(),
                'id' => $model->id,
                'field' => 'active'
            ]) . '"
        class="change-boolean fa fa-lg ' . $class . '"></div>';
    }

    public function changeOrder(Request $request)
    {
        DB::table($request->table)->whereId($request->id)->update([$request->field => $request->value]);
        return response()->json(['success'=>true]);
    }

    public function getOrderInput($model)
    {
        return '<input data-href="' . route('itemcms.change-order', [
                'table' => $model->getTable(),
                'id' => $model->id,
                'field' => 'order'
            ]) . '"class="change-order" value="'.$model->order.'"/>';
    }

}
