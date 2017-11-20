<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{__('messages.TITLE')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>

            <div class="navbar-left">
                <a href="/logout" class="btn btn-sm btn-warning" style="margin: 15px">{{_('messages.LOGOUT_USER_PANEL')}}</a>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/admin/panel">{{_('messages.MAIN_PANEL')}}</a></li>
                <li><a href="/admin/articles">{{_('messages.ARTICLES')}}</a></li>
                <li><a href="/admin/courses">{{_('messages.COURSES')}}</a></li>
            </ul>

            <ul class="nav nav-sidebar">
                <li><a href="/admin/comments">{{_('messages.ALL_COMMENTS')}} <span class="badge">{{ $commentSuccessfulCount }}</span></a></li>
                <li><a href="/admin/comments/unsuccessful"> {{_('messages.COMMENTS_NOT_CONFIRMED')}}<span class="badge">{{ $commentUnsuccessfulCount }}</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="/admin/users"> {{_('messages.USERS')}}<span class="badge">0</span></a></li>
                <li><a href="/admin/payments"> {{_('messages.SUCCESSFUL_PAYMENT')}}<span class="badge"> {{ $paymentSuccessCount }}</span></a></li>
                <li><a href="/admin/payments/unsuccessful">{{_('messages.UNSUCCESSFUL_PAYMENT')}}<span class="badge">{{ $paymentUnsuccessfulCount }}</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                @can('show-comment')
                    <li><a href="">{{_('messages.ALL_COMMENTS')}}</a></li>
                    <li><a href="">{{_('messages.COMMENTS_NOT_CONFIRMED')}} <span class="badge">0</span></a></li>
                @endcan
                {{--<li><a href="">Another nav item</a></li>--}}
            </ul>
        </div>