<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link href="{{asset('assets/css/footer.css')}}" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</head>
<body>

    <header>
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
    </header>

    <div class="row justify-content-center" style="margin-top:5%">
        <div class="col-10">
            <h2 class="text-center">Uploaded Events</h2>
            <a href="/Events/new" class="btn btn-success float-right">Tambah</a><br /><br />
            <table class="table sortable table-bordered table-striped table-hover" id="sortTable">
            <thead class="thead-dark" data-sortable="true">
                <tr>
                    <th>Foto Event</th>
                    <th>Nama Event</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                    </tr>
            </thead>
            <tbody class="table-striped">
            @foreach($list as $d)
            
                <tr>
                    <td><img src="{{asset('uploads/' . $d->fotoEvent)}}" alt="event" width="100px"></td>
                    <td>{{ $d->namaEvent }}</td>
                    <td>{{ $d->tanggalMulai }}</td>
                    <td>{{ $d->tanggalAkhir }}</td>
                    <td>{{ $d->harga }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td>
                        <a href="/Events/{{$d->idEvent}}/edit" class="btn btn-primary">Edit</a>
                        <form method="post" action="/Events/{{$d->idEvent}}/delete" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        
            @endforeach

            </table>
        </div>
    </div>

    <footer class="footer" style="margin-top:13%">
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

    <script>
        $(document).ready( function () {
            // Initialize DataTables with your table
            $('#sortTable').DataTable();
        });
    </script>
</body>
</html>
