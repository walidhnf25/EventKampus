<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Review Page - Evenfy</title>
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-5.3.2-dist\bootstrap-5.3.2-dist\css\bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}" /> <!-- Custom Styles -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/event.css')}}" rel="stylesheet">
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
                <a href="history">History</a>
                <a href="{{url("alamat")}}">Alamat</a>
                <a href="{{url("Review")}}" class="active">Ulasan</a>
                <a href="{{url("Profile")}}"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%" /></a>
            </div>
        </div>
    </header>


    <main class="container my-5">
        <h2>Event Belum Terulas</h2>
        <div class="row">
            <div class="col-md-6 rounded-3">
                <div class="card mb-3 bg-light text-black">
                    <div class="card-body">
                        <h5 class="card-title">Event 1</h5>
                        <p class="card-text">
                            <strong>Date:</strong> June 15, 2023<br />
                            <strong>Time:</strong> 10:00 AM - 4:00 PM<br />
                            <strong>Location:</strong> TULT
                        </p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reviewModal1"> Review Event
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 rounded-3">
                <div class="card mb-3 bg-light text-black">
                    <div class="card-body">
                        <h5 class="card-title">Event 2</h5>
                        <p class="card-text">
                            <strong>Date:</strong> July 20, 2023<br />
                            <strong>Time:</strong> 2:00 PM - 6:00 PM<br />
                            <strong>Location:</strong> Gedung H
                        </p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reviewModal2"> Review Event
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <h2>Events Terulas</h2>
        <div class="row">
            <div class="col-md-6 rounded-3">
                <div class="card mb-3 bg-light text-black">
                    <div class="card-body">
                        <h5 class="card-title">Event 3</h5>
                        <p class="card-text">
                            <strong>Date:</strong> June 16, 2023<br />
                            <strong>Time:</strong> 10:00 AM - 4:00 PM<br />
                            <strong>Location:</strong> TULT
                        </p>
                        <p class="text-success">Reviewed ✅</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 rounded-3">
                <div class="card mb-3 bg-light text-black">
                    <div class="card-body">
                        <h5 class="card-title">Event 4</h5>
                        <p class="card-text">
                            <strong>Date:</strong> July 21, 2023<br />
                            <strong>Time:</strong> 2:00 PM - 6:00 PM<br />
                            <strong>Location:</strong> Gedung H
                        </p>
                        <p class="text-success">Reviewed ✅</p>
                    </div>
                </div>
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
  <div class="modal fade" id="reviewModal1" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reviewModalLabel">Review Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="starRating" class="form-label">Rating</label>
              <select class="form-select" id="starRating">
                <option selected disabled>Select a rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="reviewText" class="form-label">Review</label>
              <textarea class="form-control" id="reviewText" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="reviewModal2" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reviewModalLabel">Review Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="starRating" class="form-label">Rating</label>
              <select class="form-select" id="starRating">
                <option selected disabled>Select a rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="reviewText" class="form-label">Review</label>
              <textarea class="form-control" id="reviewText" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
