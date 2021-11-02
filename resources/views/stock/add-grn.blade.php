@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);

        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {

                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show1 {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }

        .btn-xlarge {
            padding: 18px 28px;
            font-size: 22px; //change this to your desired size
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

    </style>


    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt="image"> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <div class="nav_list">
                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>
                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
                        </a>

                        <a style="text-decoration: none" href="{{ route('categories') }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Categories</span>
                        </a>


                    </div>
                </div>
                @guest

                    @if (Route::has('login'))
                        <div class="nav_item">
                            <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <div class="nav_item">
                            <a class="nav_link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endif
                @else
                    <a style="text-decoration: none" class="nav_link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                                                                                                             document.getElementById('logout-form').submit();">

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form><i class='bx bx-log-out nav_icon'></i> <span class="nav_name"> {{ __('Logout') }}</span>
                    </a>

                @endguest

            </nav>
        </div>

    </body>


    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="well">
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12"> <a>GRN number :   <span class="badge badge-info">{{$grn_id}}</span></a><br><br> <br>  </div></div>

                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12">
                            <form action="{{ route('grn.create') }}" method="POST" id="add_name">
                                {{csrf_field()}}
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <tr>
                                                <td>


                                                <label class="control-label" for="v_id">Clients</label>
                                                <select type="text" class="form-control" name="sch_id" id ="sch_id" tabindex="1" required>
                                                 
                                                    @foreach($users2 as $user2)
                                                        <option value="{{$user2->sch_id}}">{{$user2->sch_name}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                 <td>
                                <label class="control-label" for="v_id">Session</label>
                                <select type="text" class="form-control"  id ="session_id "  name="session_id">
                                                        @foreach($session as $session1)
                                                        <option value="{{$session1->id}}">{{$session1->session_number }}</option>
                                                        @endforeach

                                </select>
                            </td>
                                            <td>


                                                <label class="control-label" for="v_id">Vendor</label>
                                                <select type="text" class="form-control" name="v_id" id ="v_id" tabindex="2" required>
                                                    <option value="">Select vendor</option>
                                                    @foreach($users1 as $user1)
                                                        <option value="{{$user1->vend_id}}">{{$user1->vend_name}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td>
                                                <label class="control-label " for="">D/O</label>
                                                <input class="form-control"  name="do" required="required" id="do" tabindex="3">
                                                <input class="form-control"  name="grn_id" required type="hidden"  value="{{$grn_id}}">
                                                <input class="form-control"  name="func" required type="hidden"  value="add">
                                            </td>
                                            <td>
                                                <label class="control-label " for="">P/O</label>
                                                <input class="form-control"  name="po" required id="po" tabindex="4">
                                            </td>
                                            <td> <label class="control-label " for="">Delivery Date</label>
                                                <input type="date" name="todate" id="todate" min="1000-01-01" max="3000-12-31" class="form-control" value=""></td>
                                        </tr>
                                    </table>
                                    <div class="mydiv table-responsive">
                                        <table class="table table-responsive" id="dynamic_field">

                                            <tr>
                                                <td style=" width: 2%; "><span class="badge" style=" margin-top:35px;">1</span></td>
                                                <td>
                                                    <label class="control-label " for="">Product barcode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="span_1"></span>
                                                    <input class="form-control name_list code"  name="code[]"  id="code1" required  placeholder="Enter Product Code" onblur="check_code(1);">

                                                </td>
                                                <td>
                                                    <label class="control-label " for="">Quantity</label>
                                                    <input class="form-control name_list quantity"  name="quantity[]" required type="number"  id="quantity1"  placeholder="Enter Product Quantity">
                                                </td>

                                            </tr>
                                        </table>
                                    </div>
                                    <table class=" table table-responsive">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style=" width: 6.5%"><button type="button" name="add" id="add" class="btn btn-success bi bi-plus btn-lg" style=" margin-top: 20px;font-size:20px"></button></td>
                                        </tr>

                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3" style=" height: 50px">
                                                     <input type="submit" name="submit" id="submit" class="btn btn-info btn-lg" value="Submit" />

                                            </td></tr>
                                    </table>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),

                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {


                        // show navbar
                        nav.classList.toggle('show1')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>

<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr  id="row'+i+'"><td style=" width: 2%"><span class="badge">'+i+'</span></td><td>Product Barcode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id=span_'+i+'> </span><input type="text" required name="code[]" id="code'+i+'"  placeholder="Enter Product Code" class="form-control name_list code " onblur=" check_code('+i+');" value=""/></td><td style="margin-top:10px"><span id=span_'+i+'>Quantity</span><input type="text" required name="quantity[]"  id="quantity'+i+'" type="number"  placeholder="Enter  Product Quantity" class="quantity  form-control name_list search" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style=" margin-top: 20px">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

    });
//    function add_new_grn() {
  
//       var val= document.getElementsByClassName("name_list code");
//        var count=val.length;


           
//         if( document.add_name.v_id.value == "" ) {
//             alert( "Please select any vendor!" );
//             document.add_name.v_id.focus() ;
//             return false;

//         }
//         if( document.add_name.do.value == "" ) {
//             alert( "Please insert D/O!" );
//             document.add_name.do.focus() ;
//             return false;

//         }
//         if( document.add_name.po.value == "" ) {
//             alert( "Please insert P/O!" );
//             document.add_name.po.focus() ;
//             return false;
//         }

//         for (i=1;i<=count;i++){

//           if( document.forms["add_name"]['code'+i+''].value.length==0) {
//                 document.forms["add_name"]['code'+i+''].focus() ;

//             }
//             else
//            if( document.forms["add_name"]['quantity'+i+''].value.length==0) {
//                 document.forms["add_name"]['quantity'+i+''].focus() ;
//             }
//         else{

// if(i==count){

//                     $.ajax({
//             url:"add_grn",
//             method:"POST",
//             data:$('#add_name').serialize(),
//             success:function(data)
//             {
//                 if(data==1){
//                     alert("Data Submitted");
//                     window.location=document.referrer;
//                 }else{
//                     alert(data);
//                     // $('#add_name')[0].reset();
//                 }}
//         });
//                }
//             }
//            }


//     }

//     function delproduct(grn_data_id){

//         var grn_data_id = grn_data_id;
//        // document.write(grn_data_id);

//         $.ajax({
           
//             method:"GET",
//             data: 'action=removedata&grnd_id='+grn_data_id,
//             success:function(data)
//             {
//                 if(data==1){
//                     window.location.reload();
//                     alert("Data Submitted");

//                 }else{
//                     $('#add_name')[0].reset();
//                     alert(data);

//                 }}
//         });
//         //document.write(grn_data_id);
//     }
//     function myFunction_update(){

//         $.ajax({
//             url:"add_grn",
//             method:"POST",
//             data:$('#add_name').serialize(),
//             success:function(data)
//             {
//                 if(data==1){
//                     alert("Data Submitted");
//                     window.location=document.referrer;
//                 }else{
//                     alert(data);
//                     // $('#add_name')[0].reset();
//                 }}
//         });
//     }
//     function check_code(val){
//         var code1  = document.getElementById('code'+val+'').value;
// //        document.write(code1);
//         $.ajax({
//             url:"check_code",
//             method:"get",
//             data:'pitem_code=' + code1,
//             success:function(data)
//             {
//                 if(data==''){
//                     username_state = true;
//                     $('#code'+val+'').parent().removeClass();
//                     $('#code'+val+'').parent().addClass("form_success");
//                     $('#code'+val+'').siblings("span").text('Sorry... Product Not Available');
//                     document.getElementById("xxx").disabled = false;
//                 }else{
//                     username_state = false;
//                     $('#code'+val+'').parent().removeClass();
//                     $('#code'+val+'').parent().addClass("form_error");
//                     $('#code'+val+'').siblings("span").text(data);
//                     // document.getElementById("xxx").disabled = true;
//                     // check_name(val);
//                 }
//             }
//         });

//     }

</script>
    @endsection