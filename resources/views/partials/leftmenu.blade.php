 <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
     <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/admin/dashboard" class="nav-link {{ Request::path() === 'admin/dashboard' ? 'active' : '' }}" aria-current="page">
          Dashboard 
        </a>
      </li>
      <li>
        <a href="/admin/posts" class="nav-link {{ Request::path() === 'admin/posts' ? 'active' : '' }}">
          Posts
        </a>
      </li>
      <li>
        <a href="/admin/categories" class="nav-link {{ Request::path() === 'admin/categories' ? 'active' : '' }}">
          Categories
        </a>
      </li>
    </ul>
</div>