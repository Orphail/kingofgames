<div class="bg-black">
    <div class="container">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{route('control.panel')}}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown {{ preg_match('/(user|rank)/',url()->current())?'active':'' }}">
                                <a class="nav-link dropdown-toggle"
                                   href="#" data-toggle="dropdown">@lang('user.home')</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item {{ preg_match('/user/',url()->current())?'active':'' }}" href="{{ route('user.index') }}">@lang('user.home')</a>
                                    <a class="dropdown-item {{ preg_match('/rank/',url()->current())?'active':'' }}" href="{{ route('rank.index') }}">@lang('rank.home')</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown {{ preg_match('/\b(blog|blogCategory|tag|home-banner)\b/',url()->current())?'active':'' }}">
                                <a class="nav-link dropdown-toggle"
                                   href="#" data-toggle="dropdown">@lang('admin.blog')</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item {{ preg_match('/\b(blog)\b/',url()->current())?'active':'' }}" href="{{ route('blog.index') }}">@lang('blog.home')</a>
                                    <a class="dropdown-item {{ preg_match('/blogCategory/',url()->current())?'active':'' }}" href="{{ route('blogCategory.index') }}">@lang('blog_category.home')</a>
                                    <a class="dropdown-item {{ preg_match('/tag/',url()->current())?'active':'' }}" href="{{ route('tag.index') }}">@lang('tag.home')</a>
                                    <a class="dropdown-item {{ preg_match('/home-banner/',url()->current())?'active':'' }}" href="{{ route('home-banner.index') }}">@lang('home-banner.home')</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown {{ preg_match('/(videogame|console|genre)/',url()->current())?'active':'' }}">
                                <a class="nav-link dropdown-toggle"
                                   href="#" data-toggle="dropdown">@lang('videogame.home')</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item {{ preg_match('/videogame/',url()->current())?'active':'' }}" href="{{ route('videogame.index') }}">@lang('videogame.home')</a>
                                    <a class="dropdown-item {{ preg_match('/console/',url()->current())?'active':'' }}" href="{{ route('console.index') }}">@lang('console.home')</a>
                                    <a class="dropdown-item {{ preg_match('/genre/',url()->current())?'active':'' }}" href="{{ route('genre.index') }}">@lang('genre.home')</a>
                                </div>
                            </li>
                            <li class="nav-item {{ preg_match('/page/',url()->current())?'active':'' }}">
                                <a class="nav-link" href="{{ route('page.index') }}">@lang('page.home')</a>
                            </li>

                        </ul>
                        <div class="btn-group mr-1">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('admin.index') }}">@lang('user_admin.home')</a>
                                <a class="dropdown-item" href="{{ route('user.index') }}">@lang('user.home')</a>
                                <a class="dropdown-item" href="{{ route('parameter.index') }}">@lang('parameter.home')</a>
                            </div>
                        </div>
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