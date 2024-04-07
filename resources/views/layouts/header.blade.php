<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand me-auto" href="#">ShoppingApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Route::is('products.index')?'active':''}}" aria-current="page" href="{{ route('products.index') }}">Index</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('products.create')?'active':''}}" href="{{ route('products.create') }}">Create</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
