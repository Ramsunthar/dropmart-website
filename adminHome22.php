<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Admin</title>
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
  $(document).ready(function(){
      $("#contents").load('https://teamtreehouse.com/');
  });
</script>
  <style>
  .sidebar-bg{
    background-color: #242939;
  }

  .nav-link{
    color: #989eb3 !important;
  }
  </style>

</head>
<body>
  <nav class="navbar navbar-light fixed-top bg-light flex-md-nowrap p-0 shadow">
    <a class=" col-sm-3 col-md-2 mr-0" href="#"><img class="d-block mx-auto" src="https://via.placeholder.com/50x30.png?text=Slide+1" alt="First slide"></a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Hello, Admin!</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar-bg sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
              <span class="sidebar-icon" data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Orders

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations

              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!--HERE!-->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div id="contents" class="">
          Hello
        </div>
      </main>
    </div>
  </div>


  <script>
    feather.replace()
  </script>
  <script src="dashboard.js"></script>
</body>
</html>
