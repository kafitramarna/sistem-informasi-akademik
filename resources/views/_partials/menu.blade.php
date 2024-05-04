<ul class="navbar-nav pt-lg-3">
@foreach(getMenu() as $menu)
    <li class="nav-item">
      <a class="nav-link" href="{{ url($menu->url) }}">
        <!-- <i class="fa-solid fa-greater-than"></i> -->
        <span class="nav-link-title">{{ $menu->nama }}</span>
        <span class="nav-link-arrow text-end w-100 d-none d-lg-block">
          <i class="fa-regular fa-greater-than"></i>
        </span>
      </a>
    </li>
@endforeach