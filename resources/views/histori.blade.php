<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('assets/css/histori.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/event.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                <a href="{{url("history")}}">History</a>
                <a href="{{url("alamat")}}">Alamat</a>
                <a href="{{url("Review")}}">Ulasan</a>
                <a href="{{url("Profile")}}"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%" /></a>
            </div>
        </div>
    </header>
    <main class="isi">
        <script type="text/javascript" src="{{URL::asset('assets/jss/histori.js')}}"></script>
        <script>
            var currentYear = 2023;
            var currentMonth = 1;
            
            


        function updateYear() {
            var yearElements = document.querySelectorAll('.Tahun');
            yearElements.forEach(function (element) {
                element.textContent = currentYear;
            });

            var currentYearElement = document.querySelector('.current-year');
            currentYearElement.textContent = currentYear;
        }

        function updateMonthContainer() {
            var monthContainer = document.querySelector('.month-container');
            monthContainer.innerHTML = "";

            var monthNames = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            for (let i = currentMonth; i < currentMonth + 6; i++) {
                var monthBox = document.createElement('div');
                monthBox.classList.add('month-box');
                monthBox.textContent = monthNames[(i - 1) % 12];
                monthBox.onclick = function() { showTable(monthBox.textContent); };
                monthContainer.appendChild(monthBox);
            }

            var prevMonthButton = document.createElement('button');
            prevMonthButton.classList.add('arrow-button');
            prevMonthButton.textContent = '◄';
            prevMonthButton.onclick = function() { previousMonths(); };
            monthContainer.insertBefore(prevMonthButton, monthContainer.firstChild);

            var nextMonthButton = document.createElement('button');
            nextMonthButton.classList.add('arrow-button');
            nextMonthButton.textContent = '►';
            nextMonthButton.onclick = function() { nextMonths(); };
            monthContainer.appendChild(nextMonthButton);
        }

        function nextMonths() {
            currentMonth += 6;
            if (currentMonth > 12) {
                currentMonth = currentMonth % 12 || 12;
                currentYear++;
            }
            updateYear();
            updateMonthContainer();
        }

        function previousMonths() {
            currentMonth -= 6;
            if (currentMonth < 1) {
                currentMonth = 12 + currentMonth;
                currentYear--;
            }
            updateYear();
            updateMonthContainer();
        }

        function previousYear() {
            currentYear--;
            currentMonth = 1;
            updateYear();
            updateMonthContainer();
            hideTable();

        }

        function nextYear() {
            currentYear++;
            currentMonth = 1;
            updateYear();
            updateMonthContainer();
            hideTable();
        }

        function createTable(month) {
            console.log('createTable function called');
            var tableContainer = document.querySelector('.table-container'); // Updated selector
            tableContainer.innerHTML = ""; // Clear existing content
        
            // Make an AJAX request to the Laravel route
            fetch('/getEventData')
                .then(response => response.json())
                .then(data => {
                    var events = data.events;
        
                    var table = document.createElement('table');
                    table.id = 'data-table';
        
                    var thead = table.createTHead();
                    var row = thead.insertRow();
                    var namaCell = row.insertCell(0);
                    var tanggalCell = row.insertCell(1);
        
                    namaCell.textContent = 'Nama';
                    tanggalCell.textContent = 'Tanggal';
        
                    for (var i = 0; i < events.length; i++) {
                        var row = table.insertRow();
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        cell1.textContent = events[i].namaEvent;
                        cell2.textContent = events[i].tanggal; // Adjust the property based on your actual data structure
                    }
        
                    tableContainer.appendChild(table);
                    tableVisible = true;
                })
                .catch(error => console.error('Error fetching data:', error));
        }
        
        function hideTable() {
            var tableContainer = document.querySelector('.table-container');
            tableContainer.style.display = 'none'; // Hide the table
            tableVisible = false; // Set the visibility flag to false
        }
        // ...
        
        function showTable(month) {
            var tableContainer = document.querySelector('.table-container');
            
            // Toggle the visibility of the table
            if (tableVisible) {
                hideTable();
            } else {
                createTable(month);
                tableContainer.style.display = 'block'; // Show the table
            }
        }


        document.addEventListener('DOMContentLoaded', function () {
            var monthContainer = document.querySelector('.month-container');

            // Add click event listener to the month-container
            monthContainer.addEventListener('click', function (event) {
    if (event.target.classList.contains('month-box')) {
        var month = event.target.textContent;
        var tableContainer = document.querySelector('.table-container');
        showTable(month);
    }
});

});
        </script>
        

        <div class="year-navigation">
            <button onclick="previousYear()">Previous Year</button>
            <div>Year: <span class="current-year"></span></div>
            <button onclick="nextYear()">Next Year</button>
        </div>
    
        <div class="history">
            <h1>History</h1>
        </div>
    
        <div class="content">
            <div class="month-container">
                <div class="month-box-container"></div>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->namaEvent }}</td>
                                <td>{{ $event->tanggalMulai }} - {{ $event->tanggalAkhir }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
            <div class="kosong-container"></div>
        </div>

        <script>
            // Initial update for the year and month container
            updateYear();
            updateMonthContainer();
        </script>
        <script type="text/javascript" src="{{URL::asset('assets/jss/histori.js')}}"></script>
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

</body>
</html>
