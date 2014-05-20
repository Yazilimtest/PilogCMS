<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/admin','Pilog CMS', array('class' => 'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li @if(isset($active) && $active=="home") class="active" @endif><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-home"></span>Admin</a></li>
                <li class="dropdown  @if(isset($active) && $active=='article') active @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span>Blog <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/post','Yazı') }}</li>
                        <li>{{ HTML::link('/admin/category','Kategori') }}</li>
                    </ul></li><li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span>Dersler <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::link('/admin/article','Yazı') }}</li>
                        <li>{{ HTML::link('/admin/ders','Ders') }}</li>
                    </ul>
                    <li @if(isset($active) && $active=="user") class="active" @endif><a href="{{ url('/admin/user') }}"><span class="glyphicon glyphicon-user"></span>Yöneticiler</a></li>

                    <ul class="nav navbar-nav navbar-right">
                 <li @if(isset($active) && $active=="settings") class="active" @endif><a href="{{ url('/admin/settings') }}"><span class="glyphicon glyphicon-cog"></span>Ayarlar</a></li>
                        <li @if(isset($active) && $active=="about") class="active" @endif><a href="{{ url('/admin/about') }}"><span class="glyphicon glyphicon-th"></span>Hakkımda</a></li>

                        <li><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-off"></span>Çıkış</a></li>
            </ul>
                </li>
            </ul>
        </div>
    </div>
</div>