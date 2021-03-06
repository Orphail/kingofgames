<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Kogcms;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $field = ($request->get('sort')) ? $request->get('sort') : "id";
        $desc = ($request->get('order')) ? $request->get('order') : 'desc';
        $users = User::orderBy($field, $desc)->paginate(25)->appends(['sort' => $field, 'desc' => $desc, 'filter' => $request->get('filter')]);
        return view('kogcms.user.index',['results'=> $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('kogcms.user.form',['user'=>$user, 'route' => ['user.update',$user], 'method'=>'PATCH' ,'breadcrumb_title'=> trans('admin.edit')]);
    }

    public function create()
    {
        $user = new User();
        return view('kogcms.user.form',['user'=>$user, 'route' => ['user.store'], 'method'=>'POST','breadcrumb_title'=>trans('admin.create')]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $rules = $user->rules;
        $rules['email'] = 'required|email|unique:users,email,'.$user->id;
        if (is_null($request->get('password')))
        {
            unset($rules['password']);
        }
        $this->validate($request, $rules);
        $post = $request->all();

        $post_max_size = str_replace('M', null, ini_get('post_max_size')) * 1024;
        $this->validate($request, $rules);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->validate($request, ['image' => 'max:' . $post_max_size]);
            $file = $request->image->store('Users/' . $user->nickname, 'public');
            if ($user->image && file_exists(public_path('uploads/' . $user->image))) {
                unlink(public_path('uploads/' . $user->image));
            }
            $post['image'] = $file;
        }
        if (array_key_exists('delete_image', $post)) {
            $post['image'] = null;
        }

        if ($request->get('password'))
            $post['password'] = bcrypt($post['password']);

        $post['disabled'] = $request->get('disabled')?1:0;
        $user->update($post);
        return redirect(route('user.index'))->withMessage(trans('admin.edit_ok'));
    }


    public function store(Request $request)
    {
        $user = new User();
        $this->validate($request, [
            'nickname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:16|alpha_dash'
        ]);
        $post = $request->all();
        $post_max_size = str_replace('M', null, ini_get('post_max_size')) * 1024;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->validate($request, ['image' => 'max:' . $post_max_size]);
            $file = $request->image->store('Users/' . $user->id, 'public');
            $post['image'] = $file;
        }
        $post['password'] = bcrypt($post['password']);
        $post['disabled'] = $request->get('disabled')?1:0;
        $user->create($post);
        return redirect(route('user.index'))->withMessage(trans('admin.insert_ok'));
    }

    public function destroy($user)
    {
        try{
            $user = User::find($user);
            $user->delete();
            return redirect(route('user.index'))->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception)
        {
            return redirect(route('user.index'))->withMessage($exception->getMessage());
        }
    }

    public function loginAsMember($member_id)
    {
        Session::put('member_id',$member_id);
        return redirect(route('dashboard.index'));
    }

}