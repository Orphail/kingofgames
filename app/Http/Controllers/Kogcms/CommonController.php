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
        DB::table($request->table)->whereId($request->id)->update([$request->field => abs($res->disabled - 1)]);
        return response()->json([
            'class' => $res->disabled ? 'fa-check-circle-o' : 'fa-circle-o',
            'success' => true
        ]);
    }

    public function getBooleanInput($model)
    {
        $class = $model->disabled ? 'fa-circle-o' : 'fa-check-circle-o';
        return '<div data-href="' . route('itemcms.change-boolean', [
                'table' => $model->getTable(),
                'id' => $model->id,
                'field' => 'disabled'
            ]) . '"
        class="change-boolean fa fa-lg ' . $class . '"></div>';
    }

    public function changeValue(Request $request)
    {
        DB::table($request->table)->whereId($request->id)->update([$request->field => $request->value]);
        return response()->json(['success'=>true]);
    }

    public function getScoreInput($model)
    {
        return '<input data-href="' . route('itemcms.change-value', [
                'table' => $model->getTable(),
                'id' => $model->id,
                'field' => 'score'
            ]) . '"class="change-value" value="'.$model->score.'"/>';
    }

    public function getEvaluationInput($model)
    {
        return '<input data-href="' . route('itemcms.change-value', [
                'table' => $model->getTable(),
                'id' => $model->id,
                'field' => 'evaluation'
            ]) . '"class="change-value" value="'.$model->evaluation.'"/>';
    }

    public function getOrderInput($model)
    {
        return '<input data-href="' . route('itemcms.change-value', [
                'table' => $model->getTable(),
                'id' => $model->id,
                'field' => 'order'
            ]) . '"class="change-value" value="'.$model->order.'"/>';
    }

}
