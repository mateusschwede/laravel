<!-- Tags Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('site.home')}}">Laravel Frontend Blade</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{Route::current()->getName() === 'site.home' ? 'active' : ''}}"><a class="nav-link" href="{{route('site.home')}}">Home</a></li>
        <li class="nav-item {{Route::current()->getName() === 'site.courses' ? 'active' : ''}}"><a class="nav-link" href="{{route('site.courses')}}">Cursos</a></li>
        <li class="nav-item {{Route::current()->getName() === 'site.contact' ? 'active' : ''}}"><a class="nav-link" href="{{route('site.contact')}}" tabindex="-1" aria-disabled="true">Contato</a></li>
      </ul>
    </div>
  </nav>
</header>

<main role="main">

    @yield('content') <!--yield(section)-->

  <footer class="container">
    <h3>Rodapé</h3>
    <p>&copy; {{date('Y')}} Company X <a href="#">Terms</a></p>
  </footer>
</main>
</body>