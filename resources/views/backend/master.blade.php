<!DOCTYPE html>
<html>
  <head>
    @notifyCss
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    
    <!-- Google fonts - Poppins for copy-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    
    <!-- Prism Syntax Highlighting-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/themes/prism-okaidia.css">
    
    <!-- The Main Theme stylesheet (Contains also Bootstrap CSS)-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/css/style.default.63c85ff9.css" id="theme-stylesheet">
    
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/css/custom.0a822280.css">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/img/favicon.png">

    <style>  
      .notify {
        z-index: 9999;
        justify-content: start;
      }
      .sidebar {
        transition: width 0.3s;
        overflow: hidden;
      }
      .sidebar.collapsed {
        width: 80px;
      }
      .sidebar.collapsed .sidebar-link-title {
        display: none;
      }
      .sidebar-link.active {
        background-color: #007bff;
        color: #fff;
      }
      .sidebar-link i {
        transition: color 0.3s;
      }
      .sidebar-link:hover i {
        color: #007bff;
      }
      .sidebar-search {
        margin: 0.5rem;
      }
    </style>
  </head>

  <body>
    <!-- navbar-->
    @include('backend.partials.header')

    <div class="d-flex align-items-stretch">
      @include('backend.partials.sidebar')

      <div class="page-holder bg-gray-100">
        <div class="container">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- JavaScript files -->
    @include('notify::components.notify')
    @notifyJs
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/simple-datatables/umd/simple-datatables.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/chart.js/Chart.min.js"></script>
    <script src="js/charts-defaults.8a5fcd99.js"></script>
    <script src="js/index-default.50a9efee.js"></script>
    <script src="js/theme.87f0a411.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/prism.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    <script type="text/javascript">
      Prism.plugins.NormalizeWhitespace.setDefaults({
        'remove-trailing': true,
        'remove-indent': true,
        'left-trim': true,
        'right-trim': true,
      });
    </script>
    <script>
      function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('collapsed');
      }
      document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
      });
    </script>
  </body>
</html>
