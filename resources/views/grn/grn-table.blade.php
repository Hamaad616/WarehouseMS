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

                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
                        </a>

                        <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>


                        <a style="text-decoration: none" href="{{ route('vendors') }}" class="nav_link">
                            <i class="bi bi-people nav_icon"></i>
                            <span class="nav_name">Vendors</span>
                        </a>


                      
                        <a style="text-decoration: none" href="{{ url('add-categories') }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Categories</span>
                        </a>

                        <a style="text-decoration: none" href="{{ route('units') }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Units</span>
                        </a>


                        <a class="nav_link dropdown-toggle" style="text-decoration: none" href="#StockDropdown"
                            aria-expanded="false" data-toggle="collapse">
                            <i class="bi bi-bar-chart-steps"></i>
                            <span class="nav_name"><strong>Stock</strong></span>
                        </a>
                        <li id="StockDropdown" class="collapse">

                            <a title="GRN" class="dropdown-item nav_link" href="{{ route('grn.view', $sch_id) }}">
                                <i style="color: #0a0a0a" class="bi bi-card-checklist"></i> <span
                                    style="color: #0a0a0a">GRN</span>
                            </a>

                            <a title="Stock In" class="dropdown-item nav_link" href="{{ url('stock-in', $sch_id) }}">
                                <i style="color: #0a0a0a" class="bi bi-pencil"></i> <span style="color: #0a0a0a">Stock
                                    In</span>
                            </a>

                        </li>

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
        <h3 class="card-header"> Good Receipt Note
            <a style="float: right" data-bs-toggle="tooltip" data-bs-placement="top" title="Create a new good reciept note"
                href="{{ route('grn.create-view', $sch_id) }}" class="btn btn-success"><i class="bi bi-plus"></i></a>
        </h3>

        <div class="card-body">
            <div class="table-responsive">
                <!-- /.box-header -->
                <table id="example1" class="table table-bordered">


                    <thead>
                        <tr style="background-color:#2f54c4;color: white">
                            <th style=" width: 8%">GRN #</th>
                            <th>Vendor</th>
                            <th>Session</th>
                            <th>P/O</th>
                            <th>D/O</th>


                            <th>Total Qty</th>
                            <th>Date</th>
                            <?php
                                       if((session()->get("flag")=='1') || (session()->get("flag")=='9')){
                                        ?>
                            <th>Action</th>
                            <?php  } ?>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)

                            <?php
                            
                            //              $users155=DB::select("SELECT * from grn_details where grn_id=".$user->grn_id." and grnd_flag='1'");
                            //
                            //              $new_val = array();
                            //           if(!empty($users155)){
                            //          foreach ($users155 as $users152){
                            //
                            //
                            //                     $new_val[] = $users152->grnd_id;
                            //
                            //                    // $ids = join("','",$new_val);
                            //
                            //
                            //                     }
                            // print_r($new_val);
                            // echo "SELECT SUM(quantity) AS mainqty FROM item_stock WHERE grnd_id IN(".implode(',',$new_val).")";
                            $sqll = DB::select('SELECT sum(`rem_stack_fit`) as mainqty from grn_details where grn_id =' . $user->grn_id . " and grnd_flag='1'");
                            foreach ($sqll as $sqll2) {
                                if ($sqll2->mainqty == '0') {
                                    $textrow = '';
                                    $disabled = '';
                                } else {
                                    $textrow = 'p-3 mb-2 bg-danger text-white';
                                    $disabled = '';
                                }
                            }
                            
                            //   }
                            //        if($users152->grnd_id  ){
                            //             $flag = 'disabled="disabled"';
                            //             $flag2 = 'readonly="readonly"';
                            //             $text  = "Product Already received";
                            //        }        }
                            //}else{
                            //    $flag = '';
                            //    $flag2 = '';
                            //    $text  = '';
                            //}
                            
                            ?>
                            <tr class="{{ $textrow }}">
                                <td>
                                    <?php
                            if((session()->get("flag")=='9')){
                            ?>
                                    <a href=""><span class="badge">{{ $user->grn_id }}</span></a>
                                    <?php
                            }else{
                                ?>
                                    <a
                                        href="{{ route('grn.details-created', ['sch_id' => $sch_id, 'grn_id' => $user->grn_id]) }}"><span
                                            class="badge badge-secondary">{{ $user->grn_id }}</span></a>
                                    <?php
                            }
                                    ?>
                                </td>
                                <td>{{ $user->vend_name }}</td>
                                <td>{{ $user->session_number }}</td>
                                <td>{{ $user->po }}</td>
                                <td>{{ $user->do }}</td>
                                <td><?php echo $user->qty; ?></td>
                                <td>
                                    <?php
                                    if ($user->vend_name == 'Recycle') {
                                        echo date('d-m-Y', strtotime($user->date_time));
                                    } else {
                                        echo date('d-m-Y', strtotime($user->todate));
                                    }
                                    ?>
                                </td>
                                <?php
                                      if((session()->get("flag")=='1') || (session()->get("flag")=='9')){
                                      ?>
                                <td style="width: 15%;">

                                    <div class="btn-group">
                                        <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove the GRN"
                                            href="{{ route('grn.delete', $user->grn_id) }}" class="btn btn-danger"><i
                                                class="bi bi-trash"></i></a>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit GRN"
                                            href="{{ route('grn.edit', $user->grn_id) }}" class="btn btn-success"><i
                                                class="bi bi-pencil"></i></a>
                                        <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change status" href=""
                                            class="btn btn-secondary"><i class="bi bi-toggle-off"></i></a>

                                    </div>

                                    {{-- <a href="javascript:changeStatus({{$user->grn_id}},<?php echo $user->grn_status == 1 ? '0' : '1'; ?>,<?php echo $_GET['sch_id']; ?>) " class="<?php echo $user->grn_status == 1 ? 'btn btn-warning btn-sm ' . $disabled : 'btn btn-danger btn-sm ' . $disabled; ?>"><?php echo $user->grn_status == 1 ? 'ON' : 'OFF'; ?></a>
                                                <a href="view_grn?func=edit&grn_id={{$user->grn_id}}&sch_id=<?php echo $_GET['sch_id']; ?>&session_id={{$user->session_id}}" class="btn btn-success <?php echo $disabled; ?>"><span class="glyphicon glyphicon-edit <?php echo $disabled; ?>" data-toggle="tooltip" title="Edit"></span></a>
                                                <a href='chgrnst?func=del&grn_id={{$user->grn_id}}&sch_id=<?php echo $_GET['sch_id']; ?>'onclick="return confirm('Are you sure?')"  class="btn btn-danger <?php echo $disabled; ?>" ><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Remove"></span></a> --}}
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



    </div>

    <!------------------------------------------------------Bage Table------------------------------------------------------------>




    <script>
        $(function() {

            $(document).ready(function() {
                $('#example1').DataTable({
                    iDisplayLength: 150,
                    ordering: false,


                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });

        });
    </script>


    <script>
        function changeStatus(id, status, sch_id) {
            //alert(id);
            if (confirm("Do you want to change status ?")) {
                document.frmChangeStatus.action.value = "changeStatus";
                document.frmChangeStatus.id.value = id;
                document.frmChangeStatus.sch_id.value = sch_id;
                document.frmChangeStatus.status.value = status;
                document.frmChangeStatus.submit();
            }
        }
    </script>
    <form name="frmChangeStatus" action="chgrnst" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="action" value="" />
        <input name="id" type="hidden" value="" />
        <input name="func" type="hidden" value="status" />
        <input name="status" type="hidden" value="" />
        <input name="sch_id" type="hidden" value="" />
    </form>

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




    <script src="https://cdn.datatables.net/buttons/1.5.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

@endsection
