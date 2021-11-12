<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Categories</title>
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


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

    .show1 {
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

        .show1 {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }
    }


    .bd-callout+.bd-callout {
        margin-top: -.25rem;
    }

    .bd-callout {
        padding: 1.25rem;
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
        border: 1px solid #AFA5D9;
        border-left-width: .25rem;
        border-radius: .25rem;
    }

    input {
        margin-bottom: 8px;
    }

    #vendors-table_wrapper {
        margin-top: 3px;
    }

</style>


<body id="body-pd">
    <header class="header" id="header">

        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
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

                    <a title="categories" style="text-decoration: none" href="{{ route('units') }}"
                        class="nav_link">
                        <i class="bi bi-card-list nav_icon"></i>
                        <span class="nav_name">Units</span>
                    </a>


                    <a title="categories" style="text-decoration: none" href="{{ url('add-categories') }}"
                        class="nav_link">
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


<div class="container">
    <div class="row">
        <div class="col-md-9 mt-2">
            <div class="card">

                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categories-table" class="table table-condensed table-hover">

                            <thead>
                                <th><input type="checkbox" name="main_checkbox"><label></label></th>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Subcategories</th>
                                <th>Actions <button id="deleteAllBtn" class="btn btn-sm btn-danger d-none">Delete
                                        All</button></th>

                            </thead>

                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3 mt-2">
            <div class="card">
                <h5 class="card-header">Add Categories</h5>
                <div class="card-body">
                    <form action="{{ route('categories.add') }}" id="add_category_form" method="POST">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter Category Name"
                                name="category_name">
                            <span class="text-danger error-text category_name_error"></span>
                        </div>
                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@include('category.add_category_model')
@include('category.add_subcategory_modal')
@include('category.subcategories')
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


<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>

<script>
    toastr.options.preventDuplicates = true;
    $(function() {

        $('#add_category_form').on('submit', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault()
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: $(form).serialize(),
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0])
                        });
                    } else {
                        $(form)[0].reset()
                        $('#categories-table').DataTable().ajax.reload(null, false)
                        toastr.success(data.msg)
                    }
                }
            })

        })


        $('#categories-table').DataTable({
            processing: true,
            info: true,
            ajax: "{{ route('categories.list') }}",
            "pageLength": 5,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],

            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'subcategories',
                    name: 'subcategories',
                    orderable: false,
                    searchable: false,
                },

                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                },

            ]

        }).on('draw', function() {
            $('input[name="category_checkbox"]').each(function() {
                this.checked = false
            })
            $('input[name="main_checkbox"]').prop('checked', false)
            $('button#deleteAllBtn').addClass('d-none')
        });


        $(document).on('click', '#editCategory', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var edit_id = $(this).data('id')
            $('.editCategory').find('form')[0].reset()
            $('.editCategory').find('span.error-text').text('')
            $.post('<?= route('categories.edit') ?>', {
                edit_id: edit_id
            }, function(data) {
                // alert(data.details.vend_name)
                $('.editCategory').find('input[name="category_id"]').val(data.details.id)
                $('.editCategory').find('input[name="category_name"]').val(data.details
                    .category_name)
                $('.editCategory').modal('show')
            }, 'json')
        })

        $('#categories-update-form').on('submit', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault()
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },

                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0])
                        });
                    } else {
                        $('#categories-table').DataTable().ajax.reload(null, false)
                        $('.editCategory').modal('hide')
                        $('.editCategory').find('form')[0].reset()
                        toastr.success(data.msg)
                    }
                }
            })
        })

        $(document).on('click', '#deleteCategory', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var delete_id = $(this).data('id')
            var url = '<?= route('categories.delete') ?>';

            swal.fire({
                title: 'Are you sure?',
                html: 'You want to <b>delete<b/> this vendor',
                showCancelButton: true,
                showCloseButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#556ee6',
                width: 300,
                allowOutsideClick: false
            }).then(function(result) {
                if (result.value) {
                    $.post(url, {
                        delete_id: delete_id
                    }, function(data) {
                        if (data.code == 1) {
                            $('#categories-table').DataTable().ajax.reload(null, false)
                            toastr.success(data.msg)
                        } else {
                            toastr.error(data.msg)
                        }
                    }, 'json')
                }
            })



        })

        $(document).on('click', 'input[name="main_checkbox"]', function() {
            if (this.checked) {
                $('input[name="category_checkbox"]').each(function() {
                    this.checked = true;
                })
            } else {
                $('input[name="category_checkbox"]').each(function() {
                    this.checked = false;
                })
            }
            toggledeleteAllBtn()
        })

        $(document).on('change', 'input[name="category_checkbox"]', function() {
            if ($('input[name="category_checkbox"]').length == $(
                    'input[name="category_checkbox"]:checked')
                .length) {
                $('input[name="main_checkbox"]').prop('checked', true)
            } else {
                $('input[name="main_checkbox"]').prop('checked', false)
            }
            toggledeleteAllBtn()
        })


        function toggledeleteAllBtn() {
            if ($('input[name="category_checkbox"]:checked').length > 0) {
                $('button#deleteAllBtn').text('Delete (' + $('input[name="category_checkbox"]:checked').length +
                    ')').removeClass('d-none')
            } else {
                $('button#deleteAllBtn').addClass('d-none')
            }
        }

        $(document).on('click', 'button#deleteAllBtn', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var checkedCategories = [];
            $('input[name="category_checkbox"]:checked').each(function() {
                checkedCategories.push($(this).data('id'))
            })

            var url = '{{ route('category.selected.delete') }}';
            if (checkedCategories.length > 0) {
                swal.fire({
                    title: 'Are you sure?',
                    html: 'You want to delete <b>(' + checkedCategories.length +
                        ')<b/> vendors',
                    showCancelButton: true,
                    showCloseButton: true,
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes, Delete',
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#556ee6',
                    width: 300,
                    allowOutsideClick: false
                }).then(function(result) {
                    if (result.value) {
                        $.post(url, {
                            category_ids: checkedCategories
                        }, function(data) {
                            if (data.code == 1) {
                                $('#categories-table').DataTable().ajax.reload(null,
                                    false)
                                toastr.success(data.msg)
                            } else {
                                toastr.error(data.msg)
                            }
                        }, 'json')
                    }
                })
            }
        })

        $(document).on('click', '#addSubCategory', function(e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var category_id = $(this).data('id')
            $('.subcategoryModal').find('form')[0].reset()
            $('.subcategoryModal').find('span.error-text').text('')
            $.post('<?= route('categories.subcategory') ?>', {
                category_id: category_id
            }, function(data) {
                // alert(data.details.vend_name)
                $('.subcategoryModal').find('input[name="category_id"]').val(data.details.id)
                $('.subcategoryModal').find('input[name="category_name"]').val(data.details
                    .category_name)
                $('.subcategoryModal').modal('show')
            }, 'json')
        })

        $('#subcategories-update-form').on('submit', function(e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },

                success: function(data) {
                    console.log(data)
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0])
                        });
                    } else {
                        $('#categories-table').DataTable().ajax.reload(null, false)
                        $('.subcategoryModal').modal('hide')
                        $('.subcategoryModal').find('form')[0].reset()
                        toastr.success(data.msg)
                    }
                }
            })

        })

        $(document).on('click', '#modalClose', function() {
            $('.editCategory').modal('hide')
        });

        var table = $('#categories-table').DataTable();
        console.log(table.rows().data())
        $(document).on('click', '#subcategories', function(e) {
            e.preventDefault()
            var tr = $(this).closest("tr");
            var row = table.row(tr)

            if (row.child.isShown()) {
                row.child.hide()
                tr.removeClass('shown')

            } else {
                row.child(format(row.data(), tr)).show()
                tr.addClass('shown')
            }

        })

        function format(d, tr) {

            // console.log(d)
            // var inps = $('#subcats').attr('value');
            // for (var i = 0; i < inps.length; i++) {
            //     var inp = inps[i];
            //     alert("subcategories[" + i + "].value=" + inp.value);
            // }
            // console.log()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var category_id = d.id
            var det = '';
            $.ajax({
                method: 'POST',
                url: '{{ route('subcategories.get') }}',
                data: {
                    category_id: category_id
                },
                success: function(data){
                    for (let i = 0; i < data.details.length; i++) {
                    det += 
                            '<tr>' +
                            '<td>'+data.details[i]['category_name'] +'</td>' +
                            '</tr>';
                    }
                    $('.subCategory').find('table tbody').html(det)
                    $('.subCategory').modal('show')
                }

            }, 'json')


        }

        $('#modalCloseSubCat').on('click', function(e){
            e.preventDefault()
            $('.subCategory').modal('hide')
        })



    });
</script>
