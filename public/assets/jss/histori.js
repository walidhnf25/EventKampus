


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
      var clickedMonthBox = event.target.closest('.month-box');
      if (clickedMonthBox) {
          var month = clickedMonthBox.textContent;
          var tableContainer = document.querySelector('.table-container');
          showTable(month);
      }
  });
});