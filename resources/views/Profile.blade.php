<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Review Page - Evenfy</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-5.3.2-dist\bootstrap-5.3.2-dist\css\bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}" /><!-- Custom Styles -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <script src="profileScript.js"></script>
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" />
    <script type="text/javascript" src="{{URL::asset('assets/jss/profileScript.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
<body class="d-flex flex-column">
    <header>
        <div class="box shadow p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{asset('assets/image/logo.png')}}" alt="logo" />
                <img src="{{asset('assets/image/evenfy.png')}}" alt="logo" class="ms-4" />
            </div>
            <div class="menu d-flex align-items-center">
                <a href="{{url("dashboard")}}">Dashboard</a>
                <a href="{{url("kalender")}}">Kalender</a>
                <a href="{{url("history")}}">History</a>
                <a href="{{url("alamat")}}">Alamat</a>
                <a href="{{url("Review")}}">Ulasan</a>
                <a href="{{url("Profile")}}"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%" /></a>
            </div>
        </div>
    </header>
    

      <!-- Profile cards-->
      <main class="container my-5">
        <h2>Profile Information</h2>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card bg-light text-black rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">Username</h5>
                        <input type="text" class="form-control" value="Raffa Juhay" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card bg-light text-black rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">NIM</h5>
                        <input type="number" class="form-control" value="13022100002" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card bg-light text-black rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">Date of Birth</h5>
                        <input type="date" class="form-control" value="" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="card bg-light text-black rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">Password</h5>
                        <input type="password" class="form-control" value="bruh" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-start mb-3">
            <a href="Login" class="btn btn-danger w-25 rounded-4">Log Out</a>

            </div>
            <!-- Edit and save button-->
            <div class="col-md-6 d-flex justify-content-end mb-3">
                <button id="editButton" type="button" class="btn btn-primary w-25 rounded-4">Edit</button>
                <button id="saveButton" type="button" class="btn btn-success w-25 rounded-4" style="display: none;">Save</button>
            </div>
        </div>
    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#about us">about us</a></li>
                        <li><a href="#services">our services</a></li>
                        <li><a href="#ppolicy">privacy policy</a></li>
                        <li><a href="#addiliate">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#FAQ">FAQ</a></li>
                        <li><a href="#Helps">Helps</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

 <!-- MODAL  -->
 

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
