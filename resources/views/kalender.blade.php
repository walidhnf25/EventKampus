<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata and Title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender</title>

    <!-- External CSS files -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" />

    <!-- JavaScript for FullCalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' />

    <!-- Font Awesome and Material Icons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- JavaScript for FullCalendar -->
    <!-- jQuery Plugin -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initializing FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();

            // Adding sample events to the calendar
            calendar.addEvent({
                title: 'Test Event 1',
                start: '2023-10-08T12:30:00',
                end: '2023-10-08T13:30:00'
            });
            calendar.addEvent({
                title: 'Test Event 2',
                start: '2023-10-25T12:30:00',
                end: '2023-10-25T13:30:00'
            });
        });
    </script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="box shadow p-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <!-- Logo Images -->
                <img src="{{asset('assets/image/logo.png')}}" alt="logo">
                <img src="{{asset('assets/image/evenfy.png')}}" alt="logo" class="ms-4">
            </div>
            <!-- Navigation Menu -->
            <div class="menu d-flex align-items-center">
                <a href="{{url("dashboard")}}">Dashboard</a>
                <a href="{{url("kalender")}}" class="active">Kalender</a>
                <a href="{{url("history")}}">History</a>
                <a href="{{url("alamat")}}">Alamat</a>
                <a href="{{url("Review")}}">Ulasan</a>
                <a href="Profile"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%"></a>
            </div> 
        </div> 
    </header>

    <!-- Main Content Section -->
    <main class="p-5">
        <div class="card p-4">
            <!-- Calendar Container -->
            <div id='calendar'></div>
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
