<?php
$conn = mysqli_connect('localhost', 'root', '', 'fleetdb');
$sql =  "SELECT * FROM `vehicles` WHERE vehicle_registration_number = '$search'";
$result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
?>
<!-- wejofe works -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fleet Management | Search</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
        </li>
      </ul>
      
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
</head>

<body class="{{ $class ?? '' }}">

<!-- Remove the container if you want to extend the Footer to full width. -->
<section class="intro">
  <div class="gradient-custom-1 h-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
      @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
             {{ session('successMsg') }}
         </div>
    @endif
    <br>
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="table-responsive bg-white">
              <table class="table mb-0">
                <thead>
                  <tr>
                  <th scope="col">#</th>
                    <th scope="col">Vehicle Registration</th>
                    <th scope="col">Client</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Chassis Number</th>
                    <th scope="col">Engine</th>
                    <th scope="col">Color</th>
                    <th scope="col">Installation Date</th>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    if($count == 1){
                    ?>
                    <th scope="row" style="color: #666666;"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['vehicle_registration_number']; ?></td>
                    <td><?php echo $row['client_details']; ?></td>
                    <td><?php echo $row['vehicle_make']; ?></td>
                    <td><?php echo $row['vehicle_model']; ?></td>
                    <td><?php echo $row['chassis_number']; ?></td>
                    <td><?php echo $row['engine_number']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['instal_date']; ?></td>
                    <td><?php echo $row['serial']; ?></td>
                    <td>
          <a class="btn btn-raised btn-primary btn-sm" href="{{ route('printPdf', $row['id']) }}"><i class="fas fa-file-pdf"></i>
           Print Certificate</a> 
                    </td>
                           <?php
                                }else{
                                  return view('records')->with('errorMsg','Vehicle Not Found');
                                }
                              ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2021 Copyright:
      <a class="text-dark" href="{{ route('home') }}"
         >FleetManagementApp</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</div>
<!-- End of .container -->
</body>
<style>
    html,
body,
.intro {
  height: 100%;
}

.gradient-custom-1 {
  /* fallback for old browsers */
  background: #cd9cf2;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to top, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to top, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}
tbody td {
  font-weight: 500;
  color: #999999;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>