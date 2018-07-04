<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 18/3/18
 * Time: 19:30
 */

namespace App\Http\Controllers\Common;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $baseTheme = (session('admin'))?'admin.base':'customer.base';
        return view('common.my-profile',['user'=>$user,'baseTheme'=>$baseTheme]);
    }

    public function update(User $user, Request $request)
    {
        $rules = $user->rules;
        $rules['email'] = 'required|email|unique:users,email,'.$user->id;
        if (is_null($request->get('password')))
        {
            unset($rules['password']);
        }
        $this->validate($request, $rules);
        $post = $request->all();
        if ($request->get('password'))
            $post['password'] = bcrypt($post['password']);

        $user->update($post);
        $redirect = session('admin')?route('customer.index'):route('dashboard.index');
        return redirect($redirect)->withMessage(trans('admin.edit_ok'));
    }

}