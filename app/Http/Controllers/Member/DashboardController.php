<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 15/3/18
 * Time: 15:59
 */

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;

class DashboardController extends Controller
{
    public function index($id = null)
    {
        if($id) {
            $member = User::find($id);
        } else {
            $member = User::find(session('member_id'));
        }
//        $devices = $customer->devices;
//        $medias = $customer->medias;
//        $campaigns = $customer->campaigns;
//        return view('customer.dashboard.index', [
//            'customer' => $customer, 'devices' => $devices, 'medias' => $medias, 'campaigns' => $campaigns]);
        return view('member.dashboard.index', ['member' => $member]);
    }


    public function showPage($slug)
    {
        $Page = Page::whereSlug($slug)->first();
        if (is_null($Page)) {
            return abort(404);
        }
        return view('member.page.index', ['page' => $Page]);
    }
}
