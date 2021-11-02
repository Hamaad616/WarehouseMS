@extends('layouts.app')
@section('content')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>

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
            height: 100vh;
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
                margin: calc(var(--header-height) + 1rem) 0 0 0;
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

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }

    </style>


    <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav_list">
                    <a style="text-decoration: none" href="home" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a style="text-decoration: none" href="clients-home" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Clients</span> </a>
                    <a style="text-decoration: none" href="home" class="nav_link">
                        <i class="bi bi-house nav_icon"></i>
                        <span class="nav_name">Warehouses</span>
                    </a>

                    <div class="nav_list" >

{{--                        <a href="#CategoryDropdown" style="text-decoration: none" id="navbarDropdown" class="nav_link dropdown-toggle" role="button" href="#" data-toggle="collapse" aria-expanded="false">--}}
{{--                            <i class="bi bi-diagram-3 nav-icon"></i>--}}
{{--                            <span class="nav_name"><strong>Items</strong></span>--}}
{{--                        </a>--}}

{{--                        <div class="nav_list dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}

{{--                            @foreach($client_items as $client_item)--}}
{{--                            <a class="dropdown-item nav-link" href="">--}}
{{--                                {{$client_item->item_name}}--}}
{{--                            </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}



                    </div>

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

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h3> Good Receipt Note</h3>
                            <?php
                            if(session()->get("flag")=='1' || session()->get("flag")=='9'){
                            ?>
                            <button class="btn btn-primary" style="background-color: #31869b;
                                            border-color:#31869b;" onclick="javascript:window.location = 'view_grn_field?func=add';">
                                <span class="glyphicon glyphicon-folder-close"></span>
                                Add New GRN
                            </button>
                            <?php
                            }
                            ?>
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped example1">


                                    <thead>
                                    <tr style="background-color:#31869b;color: white">
                                        <th style=" width: 8%">GRN #</th>
                                        <th>Vendor</th>
                                        <th>P/O</th>
                                        <th>D/O</th>


                                        <th>Total Qty</th>
                                        <th>Date</th>
                                        <?php
                                        if(session()->get("flag")=='1'|| session()->get("flag")=='9'){
                                        ?>
                                        <th>Action</th>
                                        <?php  } ?>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>

                                            <td><a href="grn_details?grn_id={{$user->grn_id}}"><span class="badge">{{$user->grn_id}}</span></a></td>


                                                <td>{{$user->vend_name}}</td>

                                            <td>{{$user->po}}</td>
                                            <td>{{$user->do}}</td>


                                                <td><?php echo $user->qty; ?></td>


                                            <td><?php  echo date("d-m-Y", strtotime($user->date_time)); ?></td>
                                            <?php
                                            if(session()->get("flag")=='1'|| session()->get("flag")=='9'){
                                            ?>

                                               <td style="width: 15%;">
                                                <a href="javascript:changeStatus({{$user->grn_id}},<?php echo($user->grn_status == 1) ? "0" : "1"; ?>);" class="<?php echo($user->grn_status== 1) ? "btn btn-warning btn-sm" : "btn btn-danger btn-sm" ?>"><?php echo ($user->grn_status == 1) ? "ON" : "OFF" ?></a>
                                                <a href="view_grn?func=edit&grn_id={{$user->grn_id}}" class="btn btn-success"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></span></a>
                                                <a href='chgrnst?func=del&grn_id={{$user->grn_id}}'onclick="return confirm('Are you sure?')"  class="btn btn-danger" ><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Remove"></span></a>
                                                </td>

                                            <?php
                                            }
                                            ?>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>


                </div>
            </div>

            <!------------------------------------------------------Bage Table------------------------------------------------------------>



        </section>



    </div>
    <!-- /.content-wrapper -->
</div>

<script>
    $(function () {
        $('.example1').DataTable({
            "iDisplayLength": 25,
        })
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>


<script>
    function changeStatus(id, status) {
        //alert(id);
        if (confirm("Do you want to change status ?")) {
            document.frmChangeStatus.action.value = "changeStatus";
            document.frmChangeStatus.id.value = id;
            document.frmChangeStatus.status.value = status;
            document.frmChangeStatus.submit();
        }
    }

</script>
<form name="frmChangeStatus" action="chgrnst" method="post" >
    {{csrf_field()}}
    <input type="hidden" name="action" value="" />
    <input name="id" type="hidden" value="" />
    <input name="func" type="hidden" value="status" />
    <input name="status" type="hidden" value="" />
</form>


@endsection



