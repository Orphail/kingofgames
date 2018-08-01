<?php

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $admins = Admin::orderBy($field, $desc)->paginate(25)->appends(['sort' => $field, 'desc' => $desc, 'filter' => $request->get('filter')]);
        return view('kogcms.admin.index',['results'=> $admins]);
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('kogcms.admin.form',['admin'=>$admin, 'route' => ['admin.update',$admin], 'method'=>'PATCH' ,'breadcrumb_title'=> trans('admin.edit')]);
    }

    public function create()
    {
        $admin = new Admin();
        return view('kogcms.admin.form',['admin'=>$admin, 'route' => ['admin.store'], 'method'=>'POST','breadcrumb_title'=>trans('admin.create')]);
    }

    public function update($id, Request $request)
    {
        $admin = Admin::find($id);
        $rules = $admin->rules;
        $rules['email'] = 'required|email|unique:admins,email,'.$admin->id;
        if (is_null($request->get('password')))
        {
            unset($rules['password']);
        }
        $this->validate($request, $rules);
        $post = $request->all();
        if ($request->get('password'))
            $post['password'] = bcrypt($post['password']);

        $post['disabled'] = $request->get('disabled')?1:0;
        $admin->update($post);
        return redirect(route('admin.index'))->withMessage(trans('admin.edit_ok'));
    }


    public function store(Request $request)
    {
        $Admin = new Admin();
        $this->validate($request, [
            'nickname' => 'required|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:8|max:16|alpha_dash'
        ]);
        $post = $request->all();
        $post['password'] = bcrypt($post['password']);
        $post['disabled'] = $request->get('disabled')?1:0;
        $Admin->create($post);
        return redirect(route('admin.index'))->withMessage(trans('admin.insert_ok'));
    }

    public function destroy($admin)
    {
        try{
            $admin = Admin::find($admin);
            $admin->delete();
            return redirect(route('admin.index'))->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception)
        {
            return redirect(route('admin.index'))->withMessage($exception->getMessage());
        }
    }
}