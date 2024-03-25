<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/eventRegis.css')}}" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <nav>
        <div class="white-box">
            <a href="Event"><label class="logo">Evenfy</label></a>
            <ul>
                <li><a href="dashboard">Dashboard</a></li>
                <li><a href="kalender">Kalender</a></li>
                <li><a href="history">History</a></li>
                <li><a href="alamat">Alamat</a></li>
                <li><a href="Review">Ulasan</a></li>
                <li><a href="Profile"><img src="{{asset('assets/image/profile.png')}}" alt="" /></a></li>
            </ul>
        </div>
        <div class="searching">
            <table class="search-container">
                <tr>
                    <td>
                        <input type="text" placeholder="Search" class="search">
                    </td>
                    <td>
                        <a href="Search"><i class="material-icons">search</i></a>
                    </td>
                </tr>
            </table>
        </div>
    </nav>
    <div class="background">
        <div class="row">
            <div class="event-text">
                <h2>Change Your Mind<br /> To Become Successful</h2>
            </div>
        </div>
    </div>
    <h2>Pendaftaran untuk Event ini</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, dolore magna aliqua. Ut enim ad minim veniam, quis</p>
    <div class="sign-up">
        <div class="form">
            <form method="get" action="pembayaran">
                <div class="title">Registrasi</div>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">NIM</span>
                        <input type="text" placeholder="Enter NIM" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your E-Mail" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Fakultas</span>
                        <input type="text" placeholder="Enter your Faculty" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Jurusan</span>
                        <input type="text" placeholder="Enter your major" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
                </div>
                <div class="button">

                    <input type="submit" value="Daftar" />
                </div>
            </form>
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
</body>

</html>
