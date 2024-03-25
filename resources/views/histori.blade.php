<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('assets/css/histori.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/event.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="header">
        <header>
            <div class="box shadow p-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{asset('assets/image/logo.png')}}" alt="logo" />
                    <img src="{{asset('assets/image/evenfy.png')}}" alt="logo" class="ms-4" />
                </div>
                <div class="menu d-flex align-items-center">
                    <a href="{{url("dashboard")}}">Dashboard</a>
                    <a href="{{url("kalender")}}">Kalender</a>
                    <a href="{{url("history")}}" class="active">History</a>
                    <a href="{{url("alamat")}}">Alamat</a>
                    <a href="{{url("Review")}}">Ulasan</a>
                    <a href="Profile"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%" /></a>
                </div>
            </div>
        </header>
    </div>

    <div class="history">
        <h1>History</h1>
    </div>

    <div class="content">
        <div class="rounded-container" onclick="toggleElementBawah(this)">
            <div class="rounded-rectangle">
                <div class="judul-bulan"><h3>Januari</h3></div>
                <div class="Tahun">2023</div>
            </div>

            <div class="element-di-bawah">
                <table class="table table-hover"> <!-- Tambahkan class table-hover di sini -->
                    <tr>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                    </tr>
                    <tr>
                        <td>Nama Event 1</td>
                        <td>Tanggal 1</td>
                    </tr>
                    <tr>
                        <td>Nama Event 2</td>
                        <td>Tanggal 2</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="content">
            <div class="rounded-container" onclick="toggleElementBawah(this)">
                <div class="rounded-rectangle">
                    <div class="judul-bulan"><h3>Februari</h3></div>
                    <div class="Tahun">2023</div>
                </div>
    
                <div class="element-di-bawah">
                    <table class="table table-hover"> <!-- Tambahkan class table-hover di sini -->
                        <tr>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                        </tr>
                        <tr>
                            <td>Nama Event 1</td>
                            <td>Tanggal 1</td>
                        </tr>
                        <tr>
                            <td>Nama Event 2</td>
                            <td>Tanggal 2</td>
                        </tr>
                    </table>
                </div>
            </div>

        <!-- Tambahkan elemen .rounded-container untuk bulan lainnya seperti sebelumnya -->
        
    </div>

    

        <script type="text/javascript" src="{{URL::asset('assets/jss/histori.js')}}"></script>
</body>
</html>
