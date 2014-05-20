
<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">Pilog CMS</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            {{ HTML::link('/','ntb', array('class' => 'navbar-brand')) }}
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">


          <ul class="nav navbar-nav navbar-right">
            <li> {{ HTML::link('/','Home') }}</li>
                <li> {{ HTML::link('/blog','Blog') }}</li>
              <li>
                     {{ HTML::link('/ders/fizik','Dersler')}}
              </li>

              <li> {{ HTML::link('/about','About') }}</li>



              <li> {{ HTML::link('/contact','Contact') }}</li>
          </ul>

        </div>
      </div>
    </div>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="../" class="navbar-brand">{{ HTML::link('/','Pilog CMS', array('class' => 'navbar-brand')) }}
            </a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">


                <li>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>{{ HTML::link('/blog','Blog') }}</li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Dersler <span class="caret"></span></a>

                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a tabindex="-1" href="../amelia/">{{ HTML::link('/ders/fizik','Fizik')}}
                            </a></li>
                        <li><a tabindex="-1" href="../cerulean/">{{ HTML::link('/ders/sistem','Sistem')}}
                            </a></li>
                        <li><a tabindex="-1" href="../cosmo/">{{ HTML::link('/ders/mimari','Mimari')}}
                            </a></li>


                    </ul>
                </li>

                <li> {{ HTML::link('/about','Hakkımda') }}</li>
                <li> {{ HTML::link('/contact','İletişim') }}</li>
            </ul>

        </div>
    </div>
</div>