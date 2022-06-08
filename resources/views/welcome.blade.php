<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .submit-btn{
                color: #fff;background:#6B8085;padding-left:20px;padding-right:20px;font-weight: bolder;
            }
            .txt-color{
                color: #6B8085;
                font-weight: bolder;
            }
            .txt2-color{
                color:  #818C8E;
                font-weight:  bolder;
            }
            .form-check-input{
                border: 2px solid rgb(107, 128, 133) !important;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <notification-form csrf="{{csrf_token()}}"></notification-form>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</html>
