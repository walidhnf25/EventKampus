<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
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
                <a href="{{url("Review")}}">Ulasan</a>
                <a href="{{url("Profile")}}"><img src="{{asset('assets/image/profile.png')}}" alt="profile" width="80%" /></a>
            </div>
        </div>
    </header>
    <main class="container my-5">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <h2 style="text-align: center;"> Choose Your Payment Option
                </h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne"> Bank
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewbox="0 0 16 16">
                                <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"></path>
                            </svg>
                        </div>
                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio rounded border w-100 p-3">
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" />
                                        <label class="custom-control-label" for="credit">Bank Mandiri</label>
                                    </div>
                                    <div class="custom-control custom-radio rounded border w-100 p-3">
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" />
                                        <label class="custom-control-label" for="debit">Bank BRI</label>
                                    </div>
                                    <div class="custom-control custom-radio rounded border w-100 p-3">
                                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" />
                                        <label class="custom-control-label" for="paypal">Bank BCA</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo"> E-Wallet
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewbox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
                            </svg>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio rounded border w-100 p-3">
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" />
                                        <label class="custom-control-label" for="credit">Ovo</label>
                                    </div>
                                    <div class="custom-control custom-radio rounded border w-100 p-3">
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="" />
                                        <label class="custom-control-label" for="debit">Dana</label>
                                    </div>
                                    <div class="custom-control custom-radio rounded border w-100 p-3">
                                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" />
                                        <label class="custom-control-label" for="paypal">Gopay</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer style=" background-color: #e33f3f"> Total Pembayaran : Rp 25.000,00
                    </div>

                    <div class="text-center style=" background-color: #e33f3f">
                        <button type="button" class="btn btn-danger btn-block btn-lg text-center style=" background-color: #e33f3f">
                            <div class="d-flex justify-content-between text-center">
                                <span>Checkout</span>
                            </div>
                        </button>
                    </div>

                </div>
            </div>
    </main>
    <footer class="bg-dark text-white text-center py-4">
        <div class="container bg-dark">
            <div class="row">
                <div class="col-md-4">
                    <h5>Social</h5>
                    <p>Follow us on social media</p>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Email: info@evenfy.com<br />Phone: 123-456-7890</p>
                </div>
                <div class="col-md-4">
                    <h5>More Info</h5>
                    <p>About Us<br />Terms and Conditions<br />Privacy Policy</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
