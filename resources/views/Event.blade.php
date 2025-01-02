<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/event.css')}}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
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
    <nav>
        <div class="white-box">
            <label class="logo">Evenfy</label>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/kalender">Kalender</a></li>
                <li><a href="/history">History</a></li>
                <li><a href="/alamat">Alamat</a></li>
                <li><a href="/Review">Ulasan</a></li>
                <li><a href="/Profile"><img src="{{asset('assets/image/profile.png')}}" alt="" /></a></li>
            </ul>
        </div>
        <div class="searching">
            <form action="{{ route('event.search') }}" method="GET">
                @csrf
                <table class="search-container">
                    <tr>
                        <td>
                            <input type="text" placeholder="Search" class="search" name="search">
                        </td>
                        <td>
                            <button type="submit"><i class="material-icons">search</i></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </nav>
    <div class="background">
        <div class="row">
            <div class="event-text">
                <span>{{ $event->namaEvent }}{{ $event->deskripsi }}</span>
                <h2>{{ $event->deskripsi }}</h2>
                <h2> {{ $event->tanggalMulai }} sampai {{ $event->tanggalAkhir }}</h2>
                <form id="registerForm" action="{{ route('daftar.event', ['eventId' => $event->idEvent]) }}" method="POST">
                    @csrf
                    <button type="button" class="button-77" role="button" onclick="confirmRegistration()">Daftar Sekarang</button>
                </form>
            </div>
            <div class="event2">
                <img src="{{ asset('uploads/' . $event->fotoEvent) }}" alt="{{ $event->namaEvent }}" />
            </div>
        </div>
    </div>
    
    <div class="Details">
        <img src="{{asset('assets/image/Speaker.jpg')}}" alt="" />
        <div class="text-content">
            <h1>About Conference</h1>
                        <p>When I first got into the online advertising business, I was looking for the magical
                            combination that would put my website into the top search engine rankings, catapult me to
                            the forefront of the minds or individuals looking to buy my product, and generally make me
                            rich beyond my wildest dreams! After succeeding in the business for this long, I'm able to
                            look back on my old self with this kind of thinking and shake my head.</p>
                        <ul>
                            <li>Write On Your Business Card</li>
                            <li>Advertising Outdoors</li>
                            <li>Effective Advertising Pointers</li>
                            <li>Kook 2 Directory Add Url Free</li>
                        </ul>
        </div>
    </div>

    <div class="Speakers">
        <h1>Bintang Tamu</h1>
        <p>informasi bintang tamu yang akan hadir</p>
    </div>
        <div class="card-container">
            <div class="cards">
                <img src="{{asset('assets/image/speaker-1.jpg')}}" alt="" />
                <div class="card-content">
                    <h2>Speaker 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolore magna aliqua. Ut enim ad minim veniam, quis 
                        nostrud exercitation ullamco r in reprehenderit in voluptate 
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
            <div class="cards">
                <img src="{{asset('assets/image/speaker-2.jpg')}}" alt="" />
                <div class="card-content">
                    <h2>Speaker 2</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolore magna aliqua. Ut enim ad minim veniam, quis 
                        nostrud exercitation ullamco r in reprehenderit in voluptate 
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
            <div class="cards">
                <img src="{{asset('assets/image/speaker-3.jpg')}}" alt="" />
                <div class="card-content">
                    <h2>Speaker 3</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolore magna aliqua. Ut enim ad minim veniam, quis 
                        nostrud exercitation ullamco r in reprehenderit in voluptate 
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class="cards">
                <img src="{{asset('assets/image/speaker-4.jpg')}}" alt="" />
                <div class="card-content">
                    <h2>Speaker 4</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolore magna aliqua. Ut enim ad minim veniam, quis 
                        nostrud exercitation ullamco r in reprehenderit in voluptate 
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
        </div>
    
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
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script>
    function confirmRegistration() {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat membatalkan pendaftaran ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Daftar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('registerForm').submit();
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.auto-hide');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease'; // Animasi transisi
                alert.style.opacity = '0'; // Menghilangkan secara perlahan
                setTimeout(() => alert.remove(), 500); // Menghapus elemen setelah animasi
            }, 3000); // Waktu tampil (3 detik)
        });
    });
</script>