<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
</head>

<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light p-4 rounded shadow-lg p-3 mb-5">

                <div class="card">
                    <div class="card-body">
                        <label class="label-control" for="">Your Email is</label>
                        <input class="form-control" type="text" value="{{ $client_email }}" readonly>

                        <label class="label-control" for="">Your Password</label>
                        <input class="form-control" type="text" value="{{ $client_password_c }}" readonly>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
