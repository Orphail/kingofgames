<?php

namespace App\Http\Controllers\Kogcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeBanner;

class HomeBannerController extends Controller
{

    public function index()
    {
        $HomeBanners = HomeBanner::all();
        return view('kogcms.home-banner.index')->with('HomeBanners', $HomeBanners);
    }

    public function create()
    {
        $HomeBanner = new HomeBanner();
        return view('kogcms.home-banner.form', [
            'HomeBanner' => $HomeBanner,
            'route' => 'home-banner.store',
            'method' => 'POST',
        ]);
    }

    public function store(Request $request)
    {
        $HomeBanner = new HomeBanner();
        $rules = $HomeBanner->rules;
        $post = $request->all();
        $post_max_size = str_replace('M', null, ini_get('post_max_size')) * 1024;

        $this->validate($request, $rules);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->validate($request, ['image' => 'max:' . $post_max_size]);
            $file = $request->image->store($HomeBanner->id, 'public');
            if ($HomeBanner->image && file_exists(public_path('uploads/' . $HomeBanner->image))) {
                unlink(public_path('uploads/' . $HomeBanner->image));
            }
            $post['image'] = $file;
        }

        if (array_key_exists('delete_image', $post)) {
            $post['image'] = null;
        }

        $HomeBanner->create($post);
        return redirect(route('home-banner.index'))->withMessage(trans('admin.insert_ok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $HomeBanner = HomeBanner::find($id);
        return view('kogcms.home-banner.form', [
            'HomeBanner' => $HomeBanner,
            'route' => ['home-banner.update', $id],
            'method' => 'PATCH',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $HomeBanner = HomeBanner::find($id);
        $rules = $HomeBanner->rules;
        $post = $request->all();
        $post_max_size = str_replace('M', null, ini_get('post_max_size')) * 1024;

        $this->validate($request, $rules);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->validate($request, ['image' => 'max:' . $post_max_size]);
            $file = $request->image->store($HomeBanner->id, 'public');
            if ($HomeBanner->image && file_exists(public_path('uploads/' . $HomeBanner->image))) {
                unlink(public_path('uploads/' . $HomeBanner->image));
            }
            $post['image'] = $file;
        }

        if (array_key_exists('delete_image', $post)) {
            $post['image'] = null;
        }

        $HomeBanner->update($post);
        return redirect(route('home-banner.index'))->withMessage(trans('admin.insert_ok'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $HomeBanner = HomeBanner::find($id);
        try {
            $HomeBanner->delete();
            return redirect(route('home-banner.index'))->back()->withMessage(trans('admin.delete_ok'));

        } catch (\Exception $exception) {
            return redirect(route('home-banner.index'))->withMessage($exception->getMessage());
        }
    }
}