<?php
/**
 * Created by IntelliJ IDEA.
 * User: fidel
 * Date: 15/3/18
 * Time: 17:50
 */

namespace App\Listeners;
use App\Http\Requests\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        if ($event->user instanceOf Admin)
        {
            Session::put('admin',true);
            Session::put('member_id',null);
        } else {
            Session::put('admin',false);
            Session::put('member_id',$event->user->id);
        }
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  |Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}