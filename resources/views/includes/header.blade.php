<header>
	
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Cari Partner</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li><a href="{{route('account')}}">Your Account</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="{{route('logout')}}">Logout</a></li>
    </ul>
  </div>
</nav>
        

</header>