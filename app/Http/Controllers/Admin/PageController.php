<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 16/3/18
 * Time: 9:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $Page = new Page();
        $field = ($request->get('sort'))?$request->get('sort'):"id";
        $desc = ($request->get('order'))?$request->get('order'):'desc';
        $pages = $Page->orderBy($field,$desc)->paginate(10);
        $pages->appends(['sort'=>$field, 'desc'=>$desc]);
        return view('admin.page.index',['pages'=> $pages, 'sort'=>$field, 'desc'=>$desc]);
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.form',[
            'page'=>$page,
            'route' => ['page.update',$page],
            'method'=>'PATCH' ,
            'breadcrumb_title'=> trans('admin.edit')
        ]);
    }

    public function create()
    {
        $page = new Page();
        return view('admin.page.form',['page'=>$page, 'route' => ['page.store'], 'method'=>'POST','breadcrumb_title'=>trans('admin.create')]);
    }

    public function update(Page $page, Request $request)
    {
        $rules = $page->rules;
        $rules['slug'] = Rule::unique('pages')->ignore($page->id, 'id');
        $this->validate($request, $rules);
        $page->update($request->all());
        return redirect(route('page.index'))->withMessage(trans('admin.insert_ok'));
    }


    public function store(Request $request)
    {
        $page = new Page();
        $this->validate($request, $page->rules);
        $post = $request->all();
        $page->create($post);
        return redirect(route('page.index'))->withMessage(trans('admin.insert_ok'));
    }


    public function destroy(Page $page, Request $request)
    {
        try{
            $page->delete();
            return redirect()->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception)
        {
            return redirect()->back()->withMessage($exception->getMessage());
        }
    }
}