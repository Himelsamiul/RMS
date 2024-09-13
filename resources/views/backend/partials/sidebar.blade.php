<div class="sidebar py-3" id="sidebar">
  <button onclick="toggleSidebar()" class="btn btn-primary mb-3">Toggle Sidebar</button>
  <input type="text" id="sidebarSearch" placeholder="Search..." class="form-control sidebar-search">

  <ul class="list-unstyled">
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
        <i class="fas fa-tachometer-alt me-3"></i><span class="sidebar-link-title">Dashboard</span>
      </a>
    </li>
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted {{ request()->routeIs('category.list') ? 'active' : '' }}" href="{{ route('category.list') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Category">
        <i class="fas fa-tags me-3"></i><span class="sidebar-link-title">Category</span>
      </a>
    </li>
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted {{ request()->routeIs('menu.list') ? 'active' : '' }}" href="{{ route('menu.list') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Menu">
        <i class="fas fa-utensils me-3"></i><span class="sidebar-link-title">Menu</span>
      </a>
    </li>
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted {{ request()->routeIs('customer.list') ? 'active' : '' }}" href="{{ route('customer.list') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Customer">
        <i class="fas fa-users me-3"></i><span class="sidebar-link-title">Customer</span>
      </a>
    </li>
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted {{ request()->routeIs('order.list') ? 'active' : '' }}" href="{{ route('order.list') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Orders">
        <i class="fas fa-receipt me-3"></i><span class="sidebar-link-title">Orders</span>
      </a>
    </li>
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted {{ request()->routeIs('report.list') ? 'active' : '' }}" href="{{ route('report.list') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Report">
        <i class="fas fa-file-alt me-3"></i><span class="sidebar-link-title">Report</span>
      </a>
    </li>
    <li class="sidebar-list-item">
      <a class="sidebar-link text-muted" href="{{ route('sign.out') }}" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout">
        <i class="fas fa-sign-out-alt me-3"></i><span class="sidebar-link-title">Logout</span>
      </a>
    </li>
  </ul>
</div>

<script>
  document.getElementById('sidebarSearch').addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    document.querySelectorAll('.sidebar-list-item').forEach(function (item) {
      const text = item.textContent.toLowerCase();
      item.style.display = text.includes(searchTerm) ? 'block' : 'none';
    });
  });
</script>
