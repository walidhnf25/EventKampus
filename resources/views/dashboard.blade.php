<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External CSS files -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" />
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' />
    
    <!-- Font Awesome and Material Icons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
</head>
<body>
    <!-- Header section -->
    <header>
        <div class="box shadow p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{asset('assets/image/logo.png')}}" alt="logo">
                <img src="{{asset('assets/image/evenfy.png')}}" alt="logo" class="ms-4">
            </div>
            <div class="menu d-flex align-items-center">
                <a href="{{url("dashboard")}}" class="active">Dashboard</a>
                <a href="{{url("kalender")}}">Kalender</a>
                <a href="{{url("history")}}">History</a>
                <a href="{{url("alamat")}}">Alamat</a>
                <a href="{{url("Review")}}">Ulasan</a>
                <a href="Profile"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%"></a>
            </div> 
        </div> 
        
    </header>
    <!-- Search bar section -->
    <form action="{{ route('event.search') }}" method="GET" class="search shadow d-flex">
        <button type="submit">
            <img src="{{asset('assets/image/search.png')}}" alt="logo" />
        </button>
        <input type="text" placeholder="Pencarian" name="search">
    </form>
    <!-- Main content section -->
    <main class="p-5">
        <!-- Upload Event link -->
        <div class="d-flex justify-content-end mb-3">
            <a id="upload-event" href="Events">Upload Event</a>
        </div>
        <div><h1 class="text-center">Welcome, {{ $user->nama }}</h1></div>
        <div>
            <h1 class="mb-5">Event Kamu</h1>
            <div class="row">
            <!-- Event Kamu section with a carousel -->
            <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $flag = 0;
                @endphp
                @while($flag<count($list))
                <div class="carousel-item {{($flag==0)?'active':''}}">
                    <div class="row">
                    @php
                        $temp = $flag
                    @endphp 
                    @for($i = $temp; $i <= $temp+5 && $i < count($list) ; $i++)
                        @php
                            $d = $list[$i];
                        @endphp
                        <div class="col-2">
                            <div class="shadow item" style="width: 100%;">
                                <img src="{{asset('uploads/' . $d->fotoEvent)}}" alt="event" width="100%" height="150px" style="object-fit:cover;">
                                <div class="p-3">
                                    <h4>{{ $d->namaEvent }}</h4>
                                    <p>{{ $d->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $flag++;
                        @endphp
                    @endfor
                    </div>     
                </div> 
                @endwhile
            
            </div>
            
            <!-- Carousel controls -->
            <button href="Event" class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
        <div style="margin-top: 125px;">
            <h1 class="mb-5">Event Terkini</h1>
            <!-- Event Terkini section with a separate carousel -->
            <div id="eventCarousel1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Each carousel item contains a row of event items -->
                <!-- Slide 1 -->
                @php
                    $flag = 0;
                @endphp
                @while($flag<count($list))
                <div class="carousel-item {{($flag==0)?'active':''}}">
                    <div class="row">
                    @php
                        $temp = $flag
                    @endphp 
                    @for($i = $temp; $i <= $temp+5 && $i < count($list) ; $i++)
                        @php
                            $d = $list[$i];
                        @endphp
                        <div class="col-2">
                            <div class="shadow item" style="width: 100%;">
                                <img src="{{asset('uploads/' . $d->fotoEvent)}}" alt="event" width="100%" height="150px" style="object-fit:cover;">
                                <div class="p-3">
                                    <h4>{{ $d->namaEvent }}</h4>
                                    <p>{{ $d->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $flag++;
                        @endphp
                    @endfor
                    </div>     
                </div> 
                @endwhile
                <!-- Add more slides as needed -->

            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Company Info Column -->
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#about us">about us</a></li>
                        <li><a href="#services">our services</a></li>
                        <li><a href="#ppolicy">privacy policy</a></li>
                        <li><a href="#addiliate">affiliate program</a></li>
                    </ul>
                </div>
                <!-- Get Help Column -->
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#FAQ">FAQ</a></li>
                        <li><a href="#Helps">Helps</a></li>
                    </ul>
                </div>
                <!-- Follow Us Column -->
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
</body>
</html>
