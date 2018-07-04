<div class="bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{route('admin.index')}}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ preg_match('/admin/',url()->current())?'active':'' }}">
                                <a class="nav-link" href="{{ route('admin.index') }}">@lang('user_admin.home')</a>
                            </li>
                            <li class="nav-item {{ preg_match('/parameter/',url()->current())?'active':'' }}">
                                <a class="nav-link" href="{{ route('parameter.index') }}">@lang('parameter.home')</a>
                            </li>
                            <li class="nav-item {{ preg_match('/page/',url()->current())?'active':'' }}">
                                <a class="nav-link" href="{{ route('page.index') }}">@lang('page.home')</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary pull-right" href="{{ route('my-profile') }}"><i class="fa fa-user"></i></a>&nbsp;
                        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-power-off"></i></button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>