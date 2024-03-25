<!DOCTYPE html>
<html>
<head>
  <link href="{{asset('assets/css/detailEvent.css')}}" rel="stylesheet">
</head>
<body>
  <header></header>
  <div class="container text-center">
    <h1 class="mt-5">Event</h1>
    <div class="row justify-content-center mt-4">
      <div class="col-4">
        <div class="square bg-primary" onclick="showEventDetails('Event 1')">Square 1</div>
      </div>
      <div class="col-4">
        <div class="square bg-primary" onclick="showEventDetails('Event 2')">Square 2</div>
      </div>
      <div class="col-4">
        <div class="square bg-primary" onclick="showEventDetails('Event 3')">Square 3</div>
      </div>
    </div>
    <div class="event-text mt-4">
      <h2 id="event-details">Event Details Will Appear Here</h2>
    </div>
  </div>
  <footer></footer>
    <script type="text/javascript" src="{{URL::asset('assets/jss/detailEvent.js')}}"></script>
</body>
</html>
