<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">SIPOYAN</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Fl</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown">
        <a href="/home" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Flamboyan</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Flamboyan 07</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/posyandu">Posyandu</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Posbindu</a></li>
          <li><a class="nav-link" href="layout-top-navigation.html">Dasa Wisma</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Master</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/master/datawarga">Data Warga</a></li>
          <li><a class="nav-link" href="/master/databalita">Data Balita</a></li>
          <li><a class="nav-link" href="/master/datalansia">Data Lansia</a></li>
        </ul>
      </li>
      <?php if (logged_in() && user()->role == 1) : ?>
        <li class="menu-header">Administrator</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Data</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="components-article.html">Management Data</a></li>
            <li><a class="nav-link" href="components-article.html">Management User</a></li>
          </ul>
        </li>
      <?php endif; ?>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
  </aside>
</div>