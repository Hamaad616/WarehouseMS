<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<table class="table" id="table">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Qty</th>
        </tr>
    </thead>

    <tbody>

        <tr>
            <td>1</td>
            <td>Dum</td>
            <td> <input value="12" class="cartQuantity" id="upCart1" type="number" name="quantity" value="" size="1"
                    class="form-control quantity" min="1" max="30" /></td>
        </tr>

        <tr>
            <td>2</td>
            <td>Dum</td>
            <td> <input class="cartQuantity" id="upCart2" type="number" name="quantity" size="1"
                    class="form-control quantity" min="1" value="13" max="30" /></td>
            <td><input type="text" id="total"></td>
        </tr>

    </tbody>
</table>
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var table_length = $('#table tr').length;
        for (let i = 1; i <= table_length - 1; i++) {
            $('#upCart' + i).on('change keyup', function() {

                var total = 0
                $('#table > tbody> tr').each(function() {
                    console.log($(this).find('.cartQuantity').val())
                    total += +$(this).find('.cartQuantity').val()
                    $('#total').val(total)
                });
            })

        }
        var total = 0
        $('#table > tbody> tr').each(function() {
            console.log($(this).find('.cartQuantity').val())
            total += +$(this).find('.cartQuantity').val()
            $('#total').val(total)
        });

    })
</script>
