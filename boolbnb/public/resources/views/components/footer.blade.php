
<div class="col-12 col-sm-12 offset-md-1 col-md-4 col-lg-offset-1 col-lg-4 offset-xl-1 col-xl-4">
  <div class="logo_menu">
    <div class="logo_footer">
      <img src="/img/logoboolbnbfooter.png" alt="">
      <h3>Sede Operativa
        <br>Via Carducci 12 - 20123 Milano
        <br>Tel: 02-40031288</h3>
    </div>
  </div>
</div>

<div class="col-12 col-sm-12 offset-md-3 col-md-4 offset-lg-4 col-lg-3 offset-xl-4 col-xl-3">
  <div class="menu_footer">
    <ul>
      <li><button class="tasto" type="button" name="button"><strong>Accedi</strong></button></li>
      <li><button class="reg" type="button" name="button"><strong>Registrati</strong></button></li>
      {{-- <li><a class="reg" href="{{ route('login') }}"><strong>Registrati</strong></a><li> --}}

      <li><button class=" btnlog dropdown-item" style=color:"green" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </button></li>
    </ul>
  </div>
</div>

<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="social">
    <i class="fab fa-facebook-f"></i>
    <i class="fab fa-twitter"></i>
    <i class="fab fa-linkedin-in"></i>
    <i class="fab fa-youtube"></i>
  </div>
  <h3>Boolean SRL - Piazzale Giovanni dalle Bande Nere, 9 - 20146, Milano - P.IVA: 10214930967</h3>
</div>
