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
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column">
    <div class="row">
        @if(session('success'))
        <div class="col-12">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="col-12">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
        @endif
    </div>
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
        <h2>Ulasan Event</h2>
        <div class="row">
            @foreach($events as $event)
            <div class="col-md-6 rounded-3">
                <div class="card mb-3 bg-light text-black">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->namaEvent }}</h5>
                        <p class="card-text">
                            <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->tanggalMulai)->format('F j, Y') }} - {{ \Carbon\Carbon::parse($event->tanggalAkhir)->format('F j, Y') }}<br />
                            <strong>Time:</strong> {{ \Carbon\Carbon::parse($event->tanggalMulai)->format('g:i A') }} - {{ \Carbon\Carbon::parse($event->tanggalAkhir)->format('g:i A') }}<br />
                            <strong>Description:</strong> {{ $event->deskripsi }}<br />
                        </p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $event->idEvent  }}"> Review Event
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @foreach($events as $event)
        <div class="modal fade" id="reviewModal{{ $event->idEvent }}" tabindex="-1" aria-labelledby="reviewModalLabel{{ $event->idEvent }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel{{ $event->idEvent }}">Review {{ $event->namaEvent }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('submit.review', ['id' => $event->idEvent]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <div>
                                    @for($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="star{{ $i }}_{{ $event->idEvent }}" name="review" value="{{ $i }}" required>
                                        <label for="star{{ $i }}_{{ $event->idEvent }}">{{ $i }} ★</label>
                                    @endfor
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tutup otomatis alert setelah 5 detik
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade');
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150); // Hapus elemen setelah animasi selesai
            }, 5000);
        });
    });
</script>