<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="box shadow p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{asset('assets/image/logo.png')}}" alt="logo">
                <img src="{{asset('assets/image/evenfy.png')}}" alt="logo" class="ms-4">
            </div>
            <div class="menu d-flex align-items-center">
                <a href="{{url("dashboard")}}" class="active">Dashboard</a>
                <a href="{{url("kalender")}}">Kalender</a>
                <a href="">Maps</a>
                <a href="">Ulasan</a>
                <a href=""><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%"></a>
            </div> 
        </div> 
    </header>
    <div class="search shadow d-flex">
        <img src="{{asset('assets/image/search.png')}}" alt="logo">
        <input type="text" placeholder="Pencarian">
    </div>
    <main class="p-5">
        <div class="d-flex justify-content-end mb-3">
            <a id="upload-event">Upload Event</a>
        </div>
        <div>
            <h1 class="mb-5">Event Kamu</h1>
            <div class="row">
                <div class="col-2">
                    <div class="shadow item">
                        <img src="{{asset('assets/image/placeholder.png')}}" alt="event" width="100%">
                        <div class="p-3">
                            <h4>Event 1</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="shadow item">
                        <img src="{{asset('assets/image/placeholder.png')}}" alt="event" width="100%">
                        <div class="p-3">
                            <h4>Event 1</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="shadow item">
                        <img src="{{asset('assets/image/placeholder.png')}}" alt="event" width="100%">
                        <div class="p-3">
                            <h4>Event 1</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 125px;">
            <h1 class="mb-5">Event Terkini</h1>
            <div class="row">
                <div class="col-2">
                    <div class="shadow item">
                        <img src="{{asset('assets/image/placeholder.png')}}" alt="event" width="100%">
                        <div class="p-3">
                            <h4>Event 1</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="shadow item">
                        <img src="{{asset('assets/image/placeholder.png')}}" alt="event" width="100%">
                        <div class="p-3">
                            <h4>Event 1</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="shadow item">
                        <img src="{{asset('assets/image/placeholder.png')}}" alt="event" width="100%">
                        <div class="p-3">
                            <h4>Event 1</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>