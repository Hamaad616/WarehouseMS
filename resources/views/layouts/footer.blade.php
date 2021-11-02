


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAxhWxVAxcEVusEt8Wo7QTkKMS3jiaPvz8&sensor=false&libraries=places"></script>-->


<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();

            var mesg1 = "Address: " + address;
            mesg1 += "\nLatitude: " + latitude;
            mesg1 += "\nLongitude: " + longitude;
            //                alert(latitude);
            document.getElementById("R_longitude").value = longitude;
            document.getElementById("R_latitude").value = latitude;




            new google.maps.Geocoder().geocode(
                    {'latLng': point},
                    function (res, status) {
                        var zip = res[0].formatted_address.match(/,\s\w{2}\s(\d{5})/);
                        $("#R_Zip").val(zip);
                    }
            );


        });
    });

</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        CKEDITOR.replace('editor1')
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'})
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    });

    function mydata_function()
    {
        var code = $('#code').val();

//alert(code);
        if (code) {
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: 'item_code=' + code,
                success: function (html) {
                    $('#mydata').html(html);
                }
            });
        }
    }
    function gettital(id)
    {

        var code = $('#code_'+id).val();

//alert(code);
        if (code) {
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: 'Tial_code=' + code,
                success: function (html) {
                    $('#span_'+id).html(html);
                }
            });
        }

    }

    function outqty_function(id){

        var code = $('#code_'+id).val();
        var quantity = $('#quantity_'+id).val();
        var total_pqty = $('#qty_'+code+id).val();
        var po = $('#po_'+id).val();
//alert(po);
//alert(code);
//alert(quantity);
//alert(total_pqty);

        if (quantity) {
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: 'action=chackoutqty&p_code=' + code +'&p_qty=' + quantity +'&total_pqty=' + total_pqty+'&po=' + po,
                success: function (response) {

                    if (response == 'equal' ) {
                        username_state = false;
                        $('.MYSPAN').parent().removeClass();
                        $('.MYSPAN').parent().addClass("form_error");
                        $(".MYSPAN").text('Sorry..Product  Required Qty Already Taken');
                        document.getElementById("xxx_"+id).disabled = true;

                    }
                    else if (response == 'greater' ) {
                        username_state = false;
                        $('.MYSPAN').parent().removeClass();
                        $('.MYSPAN').parent().addClass("form_error");
                        $(".MYSPAN").text('Sorry..Product Qty greater then Remaining');
                        document.getElementById("xxx_"+id).disabled = true;

                    }else if (response == 'less'){
                        username_state = true;
                        $('.MYSPAN').parent().removeClass();
                        $('.MYSPAN').parent().addClass("form_success");
                        $(".MYSPAN").text('Yes Product Qty Available');
                        document.getElementById("xxx_"+id).disabled = false;
                    }

                }
            });

        }

    }


</script>
<script type="text/javascript">

    $('.popoverData').popover();

    $("[data-toggle=popover]").each(function(i, obj) {

        $(this).popover({
            html: true,
            content: function() {
                var id = $(this).attr('id')
                return $('#popover-content-' + id).html();
            }
        });

    });
</script>

