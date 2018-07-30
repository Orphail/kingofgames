<div class="bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{ route('dashboard.index') }}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ preg_match('/dashboard/',url()->current())?'active':'' }}">
                                <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                        </ul>
                        @if (session('admin'))
                            <a class="btn btn-primary pull-right" href="{{ route('user.index') }}">@lang('admin.admin')</a>&nbsp;
                        @endif

                        <div class="btn-group mr-1">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><a href="{{ route('my-profile') }}">@lang('admin.my_profile')</a></button>
                            </div>
                        </div>
                        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-primary  my-2 my-sm-0" type="submit"><i class="fa fa-power-off"></i></button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>