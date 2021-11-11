
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Client Details</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('mdb_b/css/mdb.min.css') }}" />
  
    <!-- Start your project here-->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        WarehouseMS
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Projects</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Notifications -->
      <a
        class="text-reset me-3 dropdown-toggle hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
        <i class="fas fa-bell"></i>
        <span class="badge rounded-pill badge-notification bg-danger">1</span>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="#">Some news</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Another news</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Something else here</a>
        </li>
      </ul>

      <!-- Avatar -->
      <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
        <img
          src="https://mdbootstrap.com/img/new/avatars/2.jpg"
          class="rounded-circle"
          height="25"
          alt=""
          loading="lazy"
        />
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="#">My profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Settings</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Logout</a>
        </li>
      </ul>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<form action="{{ route('client.update') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}


  <input type="hidden" value="{{ $sch_id }}" name="client_id">


  <div id="container" class="row d-flex justify-content-center">
      <!-- Grid column -->
      <div id="first" class="col-md-6 my-5">

          @foreach ($users as $user)

              <div class="card card-signup z-depth-1">

                  <div class="card-header">Create Client Business Details</div>

                  <div class="card-body text-center">

                      @if (session()->has('success'))
                          <div class="alert alert-success">
                              {{ session()->get('success') }}
                          </div>
                      @endif

                      @if (session()->has('danger'))
                          <div class="alert alert-success">
                              {{ session()->get('danger') }}
                          </div>
                      @endif

                      <div id="step_1_validation" style="display: none" class="alert alert-danger" role="alert">
                          Please fill out the form
                      </div>

                      <div class="md-form md-outline">
                          <input type="text" id="client_name" value="{{ $user->sch_name }}" name="client_name"
                              class="form-control">
                          <label for="Enter Client Legal Name">Enter Client Legal
                              Name</label>
                      </div>

                      <div class="md-form ">
                          <input type="hidden" id="legal_select" value="{{ $user->legal_type }}">
                          <select class="form-control md-select" name="entity_type" id="select_legal_type">
                              <option value="0" selected="">Select</option>
                              @foreach ($legal_types as $legal_type)
                                  <option value="{{ $legal_type->id }}">
                                      {{ $legal_type->legal_type_name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <div class="md-form md-outline">
                          <label for="ntn_number">NTN Number</label>
                          <input id="ntn_number" class="form-control" value="{{ $user->ntn_number }}"
                              type="text" name="ntn_number">
                      </div>

                      <div class="md-form md-outline">
                          <label for="sales_tax">Sales Tax Number</label>
                          <input id="sales_tax" class="form-control" value="{{ $user->sales_tax_number }}"
                              type="text" name="sales_tax">
                      </div>

                      <div class="md-form md-outline">
                          <label for="contact_designated_add_1">Address Line 1</label>
                          <input id="contact_designated_add_1" value="{{ $user->designated_add_1 }}"
                              class="form-control" type="text" name="contact_designated_add_1">
                      </div>


                      <div class="md-form md-outline">

                          <label for="contact_designated_add_2">Address Line 2</label>
                          <input id="contact_designated_add_2" value="{{ $user->designated_add_2 }}"
                              class="form-control" type="text" name="contact_designated_add_2">

                      </div>


                      <div class="md-form md-outline">
                          <label for="client_designated_city">City</label>
                          <input id="client_designated_city" value="{{ $user->designated_city }}"
                              class="form-control" type="text" name="client_designated_city">
                      </div>


                      <div class="card-foter text-right">
                          <button id="step_1" type="button" class="btn btn-outline-primary btn-sm"
                              style="width: 140px;">Next
                          </button>
                      </div>


                  </div>

              </div>


      </div>

      <div id="second" class="col-md-6 my-5" style="display : none">
          <div class="card card-signup z-depth-1">


              <div id="step_2_validation" style="display: none" class="alert alert-danger" role="alert">
                  Please fill out the form
              </div>

              <div class="card-header">Create Client Business Details
                  <a data-mdb-toggle="tooltip" title="Add more contacts"
                      style="float: right; cursor: pointer; font-size:1.5rem" id="add_contact"
                      data-id="{{ $user->sch_id }}" class="form-icon far fa-plus-square"></a>
              </div>
              <?php $count = 1; ?>
              @foreach ($user_other_details as $more_details)
                  <div id="dynamic_contact_div" class="card-body text-center">

                      <span style="text-align: center">Contact <?php echo $count; ?></span>

                      <div class="md-form md-outline">
                          <label for="client_contact_full_name">Full Contact
                              Name</label>
                          <input id="client_contact_full_name" value="{{ $more_details->client_full_name }}"
                              class="form-control" type="text" name="client_contact_full_name[]">
                      </div>

                      <div class="md-form md-outline">
                          <label for="client_contact_email">Contact Email</label>
                          <input id="client_contact_email" value="{{ $more_details->client_contact_email }}"
                              class="form-control" type="email" name="client_contact_email[]">
                      </div>

                      <div class="md-form md-outline">
                          <label for="client_designation">Designation</label>
                          <input id="client_designation" value="{{ $more_details->client_designation }}"
                              class="form-control" type="text" name="client_designation[]">
                      </div>

                      <div class="md-form md-outline">
                          <label for="contact_department">Department</label>
                          <input id="contact_department" class="form-control" type="text"
                              name="contact_department[]" value="{{ $more_details->client_dep }}"
                              placeholder="e.g. Accounts, Finace, Sales">
                      </div>

                      <div class="md-form md-outline">
                          <label class="label-control" for="contact_cell">Cell
                              Number</label>
                          <input id="contact_cell" value="{{ $more_details->client_cell }}"
                              class="form-control" type="text" name="contact_cell[]">
                      </div>

                      <div class="md-form md-outline">
                          <label class="label-control" for="contact_cell">Other
                              Contact</label>
                          <input id="other_contact" class="form-control" type="text"
                              value="{{ $more_details->client_other_contact }}" name="other_contact[]">
                      </div>

                      <div class="md-form md-outline">
                          <label class="label-control" for="contact_corresponding_add_1">Registered
                              Address Line
                              1</label>
                          <input id="contact_corresponding_add_1" value="{{ $more_details->client_add_1 }}"
                              class="form-control" type="text" name="contact_corresponding_add_1[]">
                      </div>

                      <div class="md-form md-outline">
                          <label class="label-control" for="contact_corresponding_add_2">Registered
                              Address Line
                              2</label>
                          <input id="contact_corresponding_add_2" value="{{ $more_details->client_add_2 }}"
                              class="form-control" type="text" name="contact_corresponding_add_2[]">
                      </div>

                      <div class="md-form md-outline">
                          <label class="label-control" for="contact_corresponding_city">City
                          </label>
                          <input id="contact_corresponding_city" value="{{ $more_details->client_city }}"
                              class="form-control" type="text" name="contact_corresponding_city[]">
                      </div>

                      <div class="md-form md-outline">
                          <label class="label-control" for="other_info_about_client">Other
                              Information about
                              client
                          </label>
                          <textarea id="other_info_about_client" class="form-control" type="text"
                              name="other_info_about_client[]">{{ $more_details->other_info_about_client }}</textarea>
                      </div>

                  </div>
                  <br>
                  <?php $count++; ?>
              @endforeach
              <div class="card-foter text-right">
                  <button id="previous_2" type="button" class="btn btn-outline-danger btn-sm"
                      style="width: 140px;">Previous
                  </button>
                  <button id="next_2" type="button" class="btn btn-primary btn-sm" style="width: 140px;">Next
                  </button>
              </div>

          </div>





      </div>

      <div id="third" style="display: none">
          <div id="step_3_validation" style="display: none" class="alert alert-danger" role="alert">
              Please Select any plan
          </div>

          <div class="card card-signup z-depth-1">

              <div class="card-header">Create Client Billing Details</div>
              <div class="card-body">

                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Minimum Monthly Charge</h5>
                          <div class="md-form">
                              <input id="per_item_charge" value="{{ $user->minimum_per_month }}"
                                  class="form-control" name="minimum_charge"
                                  placeholder="Minimum Charge Per Month">
                          </div>
                      </div>
                  </div>

                  <div class="card mt-2">
                      <div class="card-body">
                          <h5 class="card-title">Product-Inventory-in Charge</h5>
                          <small>(This charge is per item for checking and putting the
                              product/item in the
                              inventory)</small><br>
                          <div class="md-form">
                              <input id="product_in_charge" value="{{ $user->product_in_charge }}"
                                  class="form-control" name="product_in_charge"
                                  placeholder="Enter per item rate">
                          </div>
                      </div>
                  </div>

                  <div class="card mt-2">
                      <div class="card-body">
                          <h5 class="card-title">Storage Charge (on monthly basis)
                          </h5>
                          <small>Select any plan</small><br>
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-primary active btn-xlarge">
                                  <input value="1" type="radio" name="storage_plan" id="per_item_charge"
                                      autocomplete="off" <?php if($user->storage_plan == 1){?> checked="checked"
                                      <?php } ?>>
                                  <i class="bi bi-currency-dollar"></i>&nbsp;<i
                                      class="bi bi-box-seam"></i>&nbsp;Per Item
                                  Charge
                              </label>

                              <label class="btn btn-success btn-xlarge">
                                  <input value="2" type="radio" name="storage_plan" id="bulk" autocomplete="off"
                                      <?php if($user->storage_plan == 2){?> checked="checked" <?php } ?>><i
                                      class="bi bi-currency-dollar"></i>&nbsp;<i
                                      class="bi bi-view-list"></i>&nbsp;Bulk
                                  Space
                              </label>
                          </div>


                          <div class="row mt-2">

                              <!--Divisions to be shown and hidden-->
                              <div class="1 box" style="display: none">

                                  <div class="btn-group btn-group-toggle" style="margin-left: 10px;"
                                      data-toggle="buttons">
                                      <label class="btn btn-primary active btn-sm">
                                          <input value="111" type="radio" name="flat_per_item_charge"
                                              id="flat_per_item_charge" autocomplete="off" <?php if($user->per_item_charge_flat == 111){?>
                                              checked="checked" <?php } ?>>
                                          <i class="bi bi-currency-dollar"></i>&nbsp;<i
                                              class="bi bi-box-seam"></i>&nbsp;Product
                                          (flat charge)
                                      </label>

                                      <label class="btn btn-success btn-sm">
                                          <input value="222" type="radio" name="flat_per_item_charge"
                                              id="volume_based_1" autocomplete="off" <?php if($user->storage_plan == 222){?>
                                              checked="checked" <?php } ?>><i
                                              class="bi bi-currency-dollar"></i>&nbsp;<i
                                              class="bi bi-view-list"></i>&nbsp;Product
                                          (on volume)
                                      </label>
                                  </div>

                              </div>


                              <!--Divisions to be shown and hidden-->
                              <div class="2 box" style="display: none">

                                  <div class="md-form">
                                      <input type="number" style="margin-left: 2rem;" id="bulk_space"
                                          class="form-control" name="bulk_space"
                                          value="{{ $user->bulk_space }}" placeholder="Enter space in cuft">


                                      <input id="bulk_charge" style="margin-left: 2rem;" class="form-control"
                                          name="bulk_charge" value="{{ $user->bulk_charge }}"
                                          placeholder="Bulk Charge rate">
                                  </div>


                              </div>
                          </div>

                          <div class="row mt-2">
                              <div class="111 box" style="display: none">

                                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                      <label class="btn btn-primary active btn-sm">
                                          <input value="1111" type="radio" name="flat_per_day" id="flat_per_day"
                                              autocomplete="off" <?php if($user->flat_per_day == 1111){?> checked="checked"
                                              <?php } ?>>
                                          <i class="bi bi-currency-dollar"></i>&nbsp;<i
                                              class="bi bi-box-seam"></i>&nbsp;Daily
                                          (flat
                                          charge)
                                      </label>

                                      <label class="btn btn-success btn-sm">
                                          <input value="2222" type="radio" name="flat_per_month"
                                              id="flat_per_month" autocomplete="off" <?php if($user->storage_plan == 2222){?>
                                              checked="checked" <?php } ?>><i
                                              class="bi bi-currency-dollar"></i>&nbsp;<i
                                              class="bi bi-view-list"></i>&nbsp;Monthly
                                          (flat charge)
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="row mt-2">
                              <div class="222 box" style="display: none">

                                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                      <label class="btn btn-primary active btn-sm">
                                          <input value="3333" type="radio" name="flat_per_day"
                                              <?php if($user->storage_plan == 3333){?> checked="checked" <?php } ?>
                                              id="flat_per_day" autocomplete="off"> <i
                                              class="bi bi-currency-dollar"></i>&nbsp;<i
                                              class="bi bi-box-seam"></i>&nbsp;Daily
                                          (flat
                                          charge)
                                      </label>

                                      <label class="btn btn-success btn-sm">
                                          <input value="4444" <?php if($user->storage_plan == 4444){?> checked="checked"
                                              <?php } ?> type="radio" name="flat_per_month"
                                              id="flat_per_month" autocomplete="off"><i
                                              class="bi bi-currency-dollar"></i>&nbsp;<i
                                              class="bi bi-view-list"></i>&nbsp;Monthly
                                          (flat charge)
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="row mt-2">
                              <div class="1111 box" style="display: none">
                                  <div class="md-form md-outline">

                                      <input style="margin-left: 2rem;" id="per_item_charge"
                                          class="form-control" name="per_item_charge_day"
                                          value="{{ $user->per_item_charge_day }}"
                                          placeholder="Enter flat rate per day">
                                  </div>
                              </div>
                          </div>

                          <div class="row mt-2">
                              <div class="2222 box" style="display: none">
                                  <div class="md-form md-outline">

                                      <input style="margin-left: 2rem;" id="per_item_charge_month"
                                          class="form-control" name="per_item_charge_month"
                                          value="{{ $user->per_item_charge_month }}"
                                          placeholder="Enter flat rate per month">
                                  </div>
                              </div>
                          </div>

                          <div class="row mt-2">
                              <div class="3333 box" style="display: none">
                                  <div class="md-form md-outline">

                                      <input style="margin-left: 2rem;" id="per_item_charge_day_vol"
                                          class="form-control" name="per_item_charge_day_vol"
                                          value="{{ $user->per_item_charge_day_vol }}"
                                          placeholder="Enter flat rate per day">
                                  </div>
                              </div>
                          </div>

                          <div class="row mt-2">
                              <div class="4444 box" style="display: none">
                                  <div class="md-form md-outline">

                                      <input style="margin-left: 2rem;" id="per_item_charge_month_vol"
                                          class="form-control" name="per_item_charge_month_vol"
                                          value="{{ $user->per_item_charge_month_vol }}"
                                          placeholder="Enter flat rate per month">
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>

                  <div class="card mt-2">
                      <div class="card-body">
                          <h5 class="card-title">Fulfillment Fee Plan</h5>
                          <small>Select any plan</small><br>
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-primary active btn-sm">
                                  <input value="11" type="radio" name="fulfillment_plan_flat" id="flat"
                                      autocomplete="off" <?php if($user->fulfil_plan == 11){?> checked="checked"
                                      <?php } ?>>
                                  <i class="bi bi-currency-dollar"></i>&nbsp;Flat Per
                                  Order Charge
                              </label>
                              <label class="btn btn-warning btn-sm">
                                  <input value="22" type="radio" name="fulfillment_plan_flat" id="tiered"
                                      autocomplete="off" <?php if($user->fulfil_plan == 22){?> checked="checked"
                                      <?php } ?>><i class="bi bi-currency-dollar"></i>&nbsp;Tiered
                                  Charge
                              </label>

                              <label class="btn btn-info btn-sm">
                                  <input value="33" type="radio" name="fulfillment_plan_flat" id="no_of_items"
                                      autocomplete="off" <?php if($user->fulfil_plan == 33){?> checked="checked"
                                      <?php } ?>><i class="bi bi-currency-dollar"></i>&nbsp;By No.
                                  Of
                                  Items
                              </label>

                              <label class="btn btn-danger btn-sm">
                                  <input value="44" type="radio" name="fulfillment_plan_flat" id="none"
                                      autocomplete="off" <?php if($user->fulfil_plan == 44){?> checked="checked"
                                      <?php } ?>>None
                              </label>


                          </div>


                          <div class="row mt-2">

                              <!--Divisions to be shown and hidden-->
                              <div class="11 box" style="display: none">


                                  <div class="md-form md-outline">

                                      <input id="fl_rate" style="margin-left: 2rem;" class="form-control"
                                          name="fl_rate" placeholder=" Enter Flat Rate"
                                          value=" <?php if($user->fulfil_plan == 11){?> {{ $user->fl_rate }} <?php }?>">
                                  </div>


                              </div>

                          </div>

                          <div class="row mt-2">

                              <div class="22 box" style="display: none">


                                  <div class="mydiv table-responsive">
                                      <table class="table table-responsive table-bordered table-striped "
                                          id="dynamic_field2">
                                          <tr>
                                              <th>Start Order</th>

                                              <th>End Order</th>

                                              <th>Fee</th>


                                              <th></th>
                                          </tr>


                                          <?php  if($user->fulfil_plan == '22'){

                                                                  $fulfilplan = App\Http\Controllers\MainController::fulfilplans($user->fulfil_plan, $id);
                                                                  ?>

                                          @foreach ($fulfilplan as $itemsorder)
                                              <tr>
                                                  <td><input class="form-control" name="" id="index"
                                                          placeholder="Enter Value 1" value="0" readonly="">
                                                      <input class="form-control" name="start_order[]"
                                                          id="start" value="0" type="hidden">
                                                  </td>
                                                  <td><input class="form-control" name="end_order[]" id="end"
                                                          placeholder="Ente Value 2" value="">
                                                  </td>
                                                  <td><input class="form-control height" name="fee_order[]"
                                                          id="fee_order" placeholder="Enter Fee" value=""
                                                          autocomplete="off"
                                                          onkeypress="return isNumberKey(event,this)">
                                                  </td>

                                                  <td></td>
                                              </tr>
                                          @endforeach
                                          <?php } ?>
                                      </table>

                                      <table class=" table table-responsive">
                                          <tr>
                                              <td></td>
                                              <td></td>

                                              <td style=" width: 9%">
                                                  <button type="button" name="add2" id="add2"
                                                      class="btn btn-success bi bi-plus btn"
                                                      style=" margin-top: 20px;font-size:20px"></button>
                                              </td>

                                          </tr>

                                      </table>
                                  </div>
                              </div>

                          </div>

                          <div class="row mt-2">

                              <div class="33 box" style="display: none">


                                  <div class="mydiv table-responsive">
                                      <table class="table table-responsive table-bordered table-striped "
                                          id="dynamic_field">
                                          <tr>
                                              <th>Start number of Item</th>

                                              <th>End number of Item</th>

                                              <th>Fee</th>


                                              <th></th>
                                          </tr>


                                          <?php  if($user->fulfil_plan == '33'){

                                                                  $fulfilplan = App\Http\Controllers\MainController::fulfilplans($user->fulfil_plan, $id);
                                                                  ?>

                                          @foreach ($fulfilplan as $itemsorder)
                                              <tr>
                                                  <td>
                                                      <input class="form-control" name="" id="" value="0"
                                                          readonly="readonly">
                                                      <input class="form-control" name="start_item[]"
                                                          id="start" placeholder="Enter Value 1" value="0"
                                                          type="hidden">
                                                  </td>
                                                  <td><input class="form-control" name="end_item[]" id="end"
                                                          placeholder="Ente Value 2" value="">
                                                  </td>
                                                  <td><input class="form-control height" name="fee_item[]"
                                                          id="fee_item" placeholder="Enter Fee" value=""
                                                          autocomplete="off"
                                                          onkeypress="return isNumberKey(event,this)">
                                                  </td>

                                                  <td></td>
                                              </tr>
                                          @endforeach

                                          <?php } ?>

                                      </table>

                                      <table class=" table table-responsive">
                                          <tr>
                                              <td></td>
                                              <td></td>
                                              <td style=" width: 9%">
                                                  <button type="button" name="add" id="add"
                                                      class="btn btn-success bi bi-plus"
                                                      style=" margin-top: 20px;font-size:20px"></button>
                                              </td>
                                          </tr>

                                      </table>
                                  </div>
                              </div>

                          </div>

                      </div>

                  </div>

                  <div class="card mt-2">
                      <div class="card-body">
                          <h5 class="card-title">Product return/out charges</h5>
                          <small>Select any plan</small><br>
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                              <label class="btn btn-primary active btn-md">
                                  <input value="55" type="radio" name="out_return_plan_flat" id="flat"
                                      autocomplete="off" <?php if($user->product_out_charge_flat == '55'){?> checked="checked"
                                      <?php } ?>>
                                  <i class="bi bi-currency-dollar"></i>&nbsp;Flat Per
                                  Order Charge
                              </label>
                              <label class="btn btn-warning btn-md">
                                  <input value="66" type="radio" name="out_return_plan_flat_tiered" id="tiered"
                                      autocomplete="off" <?php if($user->product_out_charge_flat == '66'){?> checked="checked"
                                      <?php } ?>><i class="bi bi-currency-dollar"></i>&nbsp;Tiered
                                  Charge
                              </label>
                          </div>
                      </div>

                      <div class="row mt-2">

                          <!--Divisions to be shown and hidden-->
                          <div class="55 box" style="display: none">


                              <div class="md-form md-outline">

                                  <input id="out_return_plan_flat" style="margin-left: 2rem;"
                                      class="form-control" name="out_return_plan_flat_input"
                                      placeholder=" Enter Flat Rate"
                                      value="{{ $user->product_out_flat_rate }}">
                              </div>


                          </div>

                      </div>


                      <div class="row mt-2">

                          <div class="66 box" style="display: none">


                              <div class="mydiv table-responsive col-md-10" style="margin-left: 2rem;">
                                  <table class="table table-responsive table-bordered table-striped"
                                      id="dynamic_field3">
                                      <tr>

                                          <th>Start Order</th>

                                          <th>End Order</th>

                                          <th>Fee</th>


                                          <th></th>

                                      </tr>

                                      <?php  if($user->product_out_charge_flat == '66'){

                                                              $stockplan = App\Http\Controllers\MainController::checkUserStockOutRates($user->sch_id);
                                                              ?>
                                      @foreach ($stockplan as $itemsorder)
                                          <tr>
                                              <td>
                                                  <input class="form-control" name="start_order_out[]"
                                                      id="index" placeholder="Enter Value 1" value="0" readonly=""
                                                      value="{{ $itemsorder->start_order }}">
                                              </td>
                                              <td><input class="form-control" name="end_order_out[]" id="end"
                                                      placeholder="Ente Value 2"
                                                      value="{{ $itemsorder->end_order }}">
                                              </td>
                                              <td><input class="form-control height" name="fee_order_out[]"
                                                      id="fee_order" placeholder="Enter Fee"
                                                      value="{{ $itemsorder->fee }}" autocomplete="off"
                                                      onkeypress="return isNumberKey(event,this)">
                                              </td>

                                              <td></td>
                                          </tr>
                                      @endforeach
                                      <?php } ?>

                                  </table>

                                  <table class=" table table-responsive">
                                      <tr>
                                          <td></td>
                                          <td></td>

                                          <td style=" width: 9%">
                                              <button type="button" name="add3" id="add3"
                                                  class="btn btn-success bi bi-plus btn"
                                                  style=" margin-top: 20px;font-size:20px"></button>
                                          </td>

                                      </tr>

                                  </table>
                              </div>
                          </div>

                      </div>


                      {{-- <!--Divisions to be shown and hidden-->
                                                                                      <div class="2 box" style="display: none">

                                                                                          <div class="md-form">
                                                                                              <input type="number" style="margin-left: 2rem;" id="bulk_space"
                                                                                                  class="form-control" name="bulk_space" placeholder="Enter space in cuft">

                                                                                              <input id="bulk_charge" style="margin-left: 2rem;" class="form-control"
                                                                                                  name="bulk_charge" placeholder="Bulk Charge rate">
                                                                                          </div>


                                                                                      </div> --}}
                  </div>

              </div>
          </div>

          <div class="card mt-2">
              <div class="card-foter text-right">
                  <button id="previous_3" type="button" class="btn btn-outline-danger btn-sm"
                      style="width: 140px;">Previous
                  </button>
                  <button id="submit" type="submit" class="btn btn-success btn-sm" style="width: 140px;">Submit
                  </button>
              </div>
          </div>

      </div>



  </div>

</form>

@endforeach

@include('clients.addContactsModal')
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('mdb_b/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>

