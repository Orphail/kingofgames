<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Parameter;
use App\Models\User;
use Illuminate\Http\Request;

class ParameterController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $parameters = Parameter::orderBy($field, $desc)->paginate(25)->appends(['sort' => $field, 'desc' => $desc, 'filter' => $request->get('filter')]);
        return view('kogcms.parameter.index',['results'=>$parameters]);
    }

    public function edit($id)
    {
        $parameter = Parameter::find($id);
        return view('kogcms.parameter.form',['parameter'=>$parameter, 'route' => ['parameter.update',$parameter], 'method'=>'PATCH' ,'breadcrumb_title'=> trans('admin.edit')]);
    }

    public function create()
    {
        $parameter = new Parameter();
        return view('kogcms.parameter.form',['parameter'=>$parameter, 'route' => ['parameter.store'], 'method'=>'POST','breadcrumb_title'=>trans('admin.create')]);
    }

    public function update($id, Request $request)
    {
        $parameter = Parameter::find($id);
        $rules = $parameter->rules;
        $rules['key'] = 'required|unique:parameters,value,'.$parameter->id;
        $post = $request->all();
        if ($request->get('type') == "file")
        {
            unset($rules['value_text']);
        }

        if ($request->get('type') == "text")
        {
            $post['value'] = $request->get('value_text');
            unset($rules['value_file']);
        }
        $this->validate($request, $rules);
        if ($request->get('type') == 'file' && $request->hasFile('value_file') && $request->file('value_file')->isValid())
        {
            $file = $request->value_file->store('parameters','public');
            if ($parameter->value_file && file_exists(public_path('uploads/'.$parameter->value_file)))
                unlink(public_path('uploads/'.$parameter->value_file));
            $post['value'] = $file;
        }
        $parameter->update($post);
        return redirect(route('parameter.index'))->withMessage(trans('admin.edit_ok'));
    }


    public function store(Request $request)
    {
        $Parameter = new Parameter();
        $rules = $Parameter->rules;
        $post = $request->all();
        if ($request->get('type') == "file")
        {
            unset($rules['value_text']);
        }

        if ($request->get('type') == "text")
        {
            $post['value'] = $request->get('value_text');
            unset($rules['value_file']);
        }
        $this->validate($request, $rules);
        if ($request->get('type') == 'file' && $request->hasFile('value_file') && $request->file('value_file')->isValid())
        {
            $file = $request->value_file->store('parameters','public');
            if ($Parameter->value_file && file_exists(public_path('uploads/'.$Parameter->value_file)))
                unlink(public_path('uploads/'.$Parameter->value_file));
            $post['value'] = $file;
        }

        $Parameter->create($post);
        return redirect(route('parameter.index'))->withMessage(trans('admin.insert_ok'));
    }


    public function destroy(Parameter $parameter)
    {
        try{
            if ($parameter->type == 'file')
                @unlink(public_path('uploads/'.$parameter->value));
            $parameter->delete();
            return redirect()->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception)
        {
            return redirect()->back()->withMessage($exception->getMessage());
        }
    }
}