<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>

        .bg-black {
            background-color: #5f5f5f;
        }
        .bg-lgrey {
            background-color: lightgray;
        }

        .bg-black pre {
            color: white;
        }

    </style>

    <title>COUNT API</title>
</head>
<body>
<div class="container">
    <div class="text-center">
        <h3>Welcome to my free count API!</h3>
    </div>

    <div class="container item">
        <div class="card">
            <h5 class="card-header bg-lgrey">This is an API for calculating the total value of goods in different currencies. It receives data for each product (currency, price, quantity) and returns the amount in the selected currency.</h5>
            <div class="card-body text-center">
                <h5 class="card-title">http://www.vitchedev.net/countapi/api/count/</h5>
                <h5 class="card-title">method: POST</h5>
                <h5 class="card-title">Request example:</h5>
                <div class="container text-left bg-black">
                    <h5>
                        <pre>
                             {
                                "items":
                                    {
                                        "product_42":
                                            {
                                                "currency": "EUR",
                                                "price"   : 49.99,
                                                "quantity": 1
                                            },
                                        "product_55":
                                            {
                                                "currency": "USD",
                                                "price"   : 12,
                                                "quantity": 3
                                            }
                                    },
                                "checkoutCurrency": "EUR"
                              }
                        </pre>
                    </h5>
                </div>
            </div>
            <div class="text-center">
                <a href="https://reqbin.com/" class="btn btn-outline-primary" target="_blank">Send This request</a>
            </div>
            <br>
        </div>
    </div>


    <div class="container item">
        <div class="card">
            <h5 class="card-header bg-lgrey">This is an API gets currencies rates from free api.</h5>
            <div class="card-body text-center">
                <h5 class="card-title">http://www.vitchedev.net/countapi/api/rates/</h5>
                <h5 class="card-title">method: GET</h5>
                <h5 class="card-title">Request example:</h5>
                <div class="container text-left bg-black">
                    <h5>
                        <pre>
                             {
                              "AED": 3.673,
                              "AFN": 76.88334,
                              "ALL": 105.173105,
                              "AMD": 481.616228,
                              "ANG": 1.797014,
                              "AOA": 621.945,
                              "ARS": 74.6466,
                              "AUD": 1.378749,
                              "AWG": 1.8,
                              "AZN": 1.7025,
                              "BAM": 1.656634,
                              "BBD": 2,
                              "BDT": 84.899789,
                              "BGN": 1.655893,
                              "BHD": 0.377043,
                              "BIF": 1932.390813,
                              "BMD": 1,
                              "BND": 1.368405,
                              "BOB": 6.912727,
                              "BRL": 5.299499,
                                ...
                              }
                        </pre>
                    </h5>
                </div>
            </div>
            <div class="text-center">
                <a href="https://reqbin.com/" class="btn btn-outline-primary" target="_blank">Send This request</a>
            </div>
            <br>
        </div>
    </div>
</div>
<br>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
