<!DOCTYPE html>
<html>
<head>
    <title>My Simple Webpage</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="{{asset('assets/css/Alamat.css')}}" rel="stylesheet">
</head>
</head>
<body>
    <header>
        <div class="box shadow p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{asset('assets/image/logo.png')}}" alt="logo">
                <img src="{{asset('assets/image/evenfy.png')}}" alt="logo" class="ms-4">
            </div>
            <div class="menu d-flex align-items-center">
                <a href="{{url("dashboard")}}">Dashboard</a>
                <a href="{{url("kalender")}}">Kalender</a>
                <a href="{{url("history")}}">History</a>
                <a href="{{url("alamat")}}" class="active">Alamat</a>
                <a href="{{url("Review")}}">Ulasan</a>
                <a href="Profile"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%"></a>
            </div> 
        </div> 
    </header>
    <main>
        <div class="content-container">
            <div class="image-container">
                <img src="your-image.jpg" alt="Event Image">
            </div>
            <div class="carousel-controls">
                <button class="prev-button">Prev</button>
                <div class="carousel-container">
                    <div class="carousel-slide">
                        <div class="carousel-box">Detail Event</div>
                        
                    </div>
                    <div class="carousel-slide">
                        <div class="carousel-box">Alamat Event</div>
                    </div>
                    <div class="carousel-slide">
                        <div class="carousel-box">Jadwal Event</div>
                    </div>
                </div>
                <button class="next-button">Next</button>
            </div>
        </div>
    </main>
    <footer class="bg-dark text-white text-center py-4">
        <div class="container bg-dark">
            <div class="row">
                <div class="col-md-4">
                    <h5>Social</h5>
                    <p>Follow us on social media</p>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Email: info@evenfy.com<br />Phone: 123-456-7890</p>
                </div>
                <div class="col-md-4">
                    <h5>More Info</h5>
                    <p>About Us<br />Terms and Conditions<br />Privacy Policy</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('assets/jss/Alamat.js')}}"></script>
</body>
</html>
