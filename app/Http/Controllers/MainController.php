<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function checklogin(Request $request)
    {

        if ($request->session()->has("email")) {
            return view("index", ['id' => '0']);
        } else {
            return view("auth.login", ['id' => '0']);
        }
    }

    public function user_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $users = DB::select("select * from login where email='$email' and lgn_password='$password'");
        if (empty($users)) {
            return redirect("/");
        } else {
            foreach ($users as $user) {
                $request->session()->put('username', $user->name);
                $request->session()->put('id', $user->id);
                $request->session()->put('flag', 1);
                // $request->session()->put('reg_id', $user->reg_id);
                // $request->session()->put('sch_id', $user->sch_id);
            }



            return view("index", ['id' => '0']);
        }
    }

    // public static function sidebar_item()
    // {
    //     $users = DB::select("SELECT * from item where item_flag=1 and item_status=1");
    //     return $users;
    // }

    // public static function sidebar_client()
    // {
    //     $client = DB::select("SELECT * from school where sch_status=1 and sch_flag=1");
    //     return $client;
    // }
    // public static function sidebar_session()
    // {
    //     $academic_session = DB::select("SELECT * from academic_session where flag=1");
    //     return $academic_session;
    // }

    public function getWareHouseById($wh_id, $wh_name, $wh_code)
    {
        $racks = DB::select('select * from rack where wh_id = ?', [$wh_id]);
        $warehouse_name = DB::table('Warehouses')->where('wh_id', $wh_id)->pluck('wh_name')->toArray();
        return view('racks.racks_index', ['racks' => $racks], compact(['warehouse_name', 'wh_id', 'wh_name', 'wh_code']));
    }

    public function viewRacksAdd($wh_id, $wh_code, $wh_name)
    {
        return view('racks.rack_add', compact(['wh_id', 'wh_code', 'wh_name']));
    }

    public function addNewRack(Request $request)
    {
        $rk_location = strtoupper($request->rk_location);
        $rk_code = strtoupper($request->rk_code);
        $rackcode = $request->wh_code . '-' . $rk_location . '-' . $rk_code;

        $users = DB::select("INSERT INTO `rack`( `wh_id`, `rk_location`, `rk_code`, `row_name`, `rack_code`, `width`, `height`,
        `depth`) VALUES ('$request->wh_id','$rk_location','$rk_code','$request->row_name','$rackcode','$request->width','$request->height','$request->depth')");
        return redirect()->route('warehouse.details', ['wh_id' => $request->wh_id, 'wh_code' => $request->wh_code, 'wh_name' => $request->wh_name]);
    }

    public function addRowInRackView($wh_id, $rack_id)
    {

        $row = DB::select("select * from rack where rk_id = '$rack_id'");
        $users = DB::select("SELECT * from row_info where wh_id = '$wh_id' and rk_id='$rack_id'");
        $rows_count = count(DB::select('select * from row_info where rk_id = ?', [$rack_id]));
        return view('racks.add-row', ['rack_id' => $rack_id, 'row' => $row, 'wh_id' => $wh_id, 'rows_count' => $rows_count]);
    }

    public function rackEdit(Request $request)
    {
        $rackcode = $request->wh_code . '-' . $request->rk_location . '-' . $request->rk_code;
        $users = DB::select("UPDATE `rack` SET `rk_location`='$request->rk_location',
        `rk_code`='$request->rk_code',`row_name`='$request->row_name',`rack_code`='$rackcode',`width`='$request->width',`height`='$request->height',`depth`='$request->depth' WHERE rk_id='$request->rk_id'");
        $users = DB::select("SELECT * from row_info where row_info.rk_id='$request->rk_id' ");
        foreach ($users as $user) {



            $newcode = $rackcode . '-' . $user->row_name;


            $users = DB::select("UPDATE `row_info` SET `row_code`='$newcode' WHERE id='$user->id'");
        }


        return redirect()->back();
    }

    public function add_new_rows(Request $request)
    {

        $arrayLength = count($request->row_name);
        for ($col = 0; $col < $arrayLength; $col++) {

            $row_name =  $request->row_name[$col];
            $width   =  $request->width[$col];
            $depth   =  $request->depth[$col];
            $height   =  $request->height[$col];
            $rk_code   =  $request->rack_code;
            $row_code = $rk_code . '-' . $row_name;


            $users = DB::select("INSERT INTO `row_info`( `wh_id`,`rk_id`, `row_name`,`row_code`, `width`, `height`,
                `depth`) VALUES ('$request->wh_id','$request->rk_id','$row_name','$row_code','$width','$height','$depth')");
        }


        return redirect()->back();
    }

    public function warehouse_row_table($wh_id, $rk_id)
    {
        $row_info = DB::select('select * from row_info where rk_id = ?', [$rk_id]);
        $rack_name = DB::table('rack')->where('rk_id', $rk_id)->pluck('rack_code')->toArray();
        $users = DB::select("SELECT * from row_info where wh_id = '$wh_id' and rk_id=$rk_id");
        return view("racks.rack-row", ['users' => $users, 'wh_id' => $wh_id, 'rack_name' => $rack_name, 'rk_id' => $rk_id]);
    }

    public function getRackBarcodes($wh_id, $rk_id)
    {
        $users = DB::select("select *  from rack where wh_id='$wh_id' and rk_id='$rk_id' ");
        return view('racks.check_rack_barcode', ['users' => $users]);
    }

    public static function grn_rack_rows($rk_id)
    {
        $new_val = array();
        $users = DB::select("SELECT * from row_info where row_info.rk_id='$rk_id' ");
        foreach ($users as $user) {

            $val = new stdClass();
            $val->wh_id = $user->wh_id;
            $val->rk_id = $user->rk_id;
            $val->row_name = $user->row_name;
            $val->row_code = $user->row_code;
            $val->row_id = $user->id;

            $new_val[] = $val;
        }
        return $new_val;
        // return view("total_stock", ['usersrow' => $users]);
    }

    public static function grn_rack_bins($row_id)
    {
        $new_val = array();
        $users = DB::select("SELECT * from bin_info where bin_info.row_id='$row_id' ");
        foreach ($users as $user) {

            $val = new stdClass();
            $val->wh_id = $user->wh_id;
            $val->rk_id = $user->rk_id;
            $val->row_id = $user->row_id;
            $val->bin_id = $user->id;
            $val->bin_code = $user->bin_code;


            $new_val[] = $val;
        }
        return $new_val;
        // return view("total_stock", ['usersrow' => $users]);
    }

    public function add_bin($wh_id, $rk_id, $rk_name, $row_id, $row_code, $width, $height, $depth)
    {
        $users = DB::select("SELECT * from row_info where wh_id = '$wh_id' and rk_id='$rk_id' and id=$row_id");
        $sum = DB::select('select SUM(Width) as total_row_width from bin_info where row_id = ?', [$row_id]);
        return view('bin.add-bin', ['users' => $users, 'width' => $width, 'height' => $height, 'depth' => $depth, 'wh_id' => $wh_id, 'rk_id' => $rk_id, 'rk_name' => $rk_name, 'row_code' => $row_code, 'row_id' => $row_id, 'sum' => $sum]);
    }

    public function storeBin(Request $request)
    {
        $arrayLength = count($request->bin_name);
        for ($col = 0; $col < $arrayLength; $col++) {

            $row_name =  $request->bin_name[$col];
            $width   =  $request->width[$col];
            $depth   =  $request->depth[$col];
            $height   =  $request->height[$col];
            $rk_code   =  $request->row_code;
            $row_code = $rk_code . '-' . $row_name;

            $users = DB::select("INSERT INTO `bin_info`( `wh_id`,`rk_id`,`row_id`, `bin_name`,`bin_code`, `Width`, `Height`,`Depth`) VALUES ('$request->wh_id','$request->rk_id','$request->row_id','$row_name','$row_code','$width','$height','$depth')");
        }

        return redirect()->back()->with('success', 'Successfully added bin inside the row');
    }

    public function editWarehouseRackById($rk_id, $wh_id, $wh_code, $wh_name)
    {
        $rack =  DB::select('select * from rack where rk_id = ?', [$rk_id]);
        return view('racks.rack-edit', ['rack' => $rack, 'wh_id' => $wh_id, 'wh_code' => $wh_code, 'wh_name' => $wh_name]);
    }

    public function deleteWarehouseRackById($rk_id)
    {
        $rk_record =  DB::select('delete from rack where rk_id = ?', [$rk_id]);
        return redirect()->back();
    }

    public function editWareHouseById($wh_id)
    {
        $warehouses = DB::select('select * from Warehouses where wh_id = ?', [$wh_id]);
        return view('warehouses.warehouse-edit', ['warehouses' => $warehouses], compact(['wh_id']));
    }

    public function updateWarehouse(Request $request)
    {
        $users = DB::select("UPDATE Warehouses SET `wh_name`='$request->wh_name',`wh_person`='$request->wh_person',`wh_address`='$request->wh_address',`wh_code`='$request->wh_code',`wh_email`='$request->wh_email'
            ,`wh_phone`='$request->wh_number'where wh_id='$request->wh_id'");
        return redirect()->route('home');
    }


    public function deleteWareHouseById($wh_id)
    {
        DB::delete('delete from Warehouses where wh_id = ?', [$wh_id]);
        return redirect()->route('home');
    }

    public function getClientsHome()
    {
        $clients = DB::select('select * from clients');
        return view('clients.clients', ['clients' => $clients]);
    }

    public function getClientItems($sch_id)
    {
        $client_items = DB::select('select * from item');
        $categories = DB::select('select * from categories');
        $c_items = DB::select('select * from product_item where client_id = ?', [$sch_id]);

        return view('items.client_items', ['client_items' => $client_items, 'categories' => $categories, 'c_items' => $c_items], compact(['sch_id']));
    }

    public static function getItemLocation($sch_id)
    {

        $c_items = DB::table('item_stock')
            ->join('rack', 'rack.rack_code', '=', 'item_stock.rk_code')
            ->select('*')
            ->where('product_id', '=', $sch_id)
            ->get();

        return $c_items;
    }

    public function getProductItemTable($item_id, $sch_id, $item_name)
    {
        $client_items = DB::select('select * from item');
        $users = DB::select("SELECT * from product_item where product_item.item_id='$item_id' and product_item.client_id='$sch_id' and product_item.pitem_flag=1 group  by product_item.pitem_id");
        return view('items.product_item_table', compact(['client_items', 'users', 'sch_id', 'item_name']));
    }

    public static function getproduct_item_table1($value)
    {
        $users6 = DB::select("SELECT item_stock.rk_code,rack.rk_location,item_stock.quantity FROM product_item,grn_details,item_stock,rack where
       product_item.pitem_id='$value'  and product_item.pitem_code=grn_details.grnd_code and grn_details.grnd_id=item_stock.grnd_id and rack.rk_code=item_stock.rk_code");
        return $users6;
    }

    public static function get_fee_plan($item_id)
    {
        $new_val = array();
        $users = DB::select("SELECT * from product_items_details where product_items_details.pitem_id='$item_id' ");
        foreach ($users as $user) {
            $val = new stdClass();
            $val->start = $user->start;
            $val->end = $user->end;
            $val->fee = $user->fee;
            $new_val[] = $val;
        }
        return $new_val;
    }

    public static function getFeePlan($sch_id)
    {
        $plan =  DB::select('select * from clients where sch_id = ?', [$sch_id]);
        return $plan;
    }

    public static function productFulfillmentRate($sch_id)
    {
        $plan =  DB::select('select * from product_fulfillment_rate where client_id = ?', [$sch_id]);
        return $plan;
    }

    public static function productFulfillmentRate2($sch_id)
    {
        $plan =  DB::select('select * from product_fulfillment_rate_2 where client_id = ?', [$sch_id]);
        return $plan;
    }



    public static function get_schname($item_id)
    {
        $new_val = array();
        $users = DB::select("SELECT *from product_items_details where product_items_details.pitem_id='$item_id' group by product_items_details.client_id");
        foreach ($users as $user) {


            $users6 = DB::select("SELECT school.sch_name
              from school where sch_id='$user->client_id'");
            foreach ($users6 as $user6) {
                $val = new stdClass();
                $val->sch_name = $user6->sch_name;
                $new_val[] = $val;
            }
        }
        return $new_val;
    }

    public function viewClientCreate()
    {
        $legal_types = DB::select('select * from legal_types');
        return view('clients.create-client-view', ['legal_types' => $legal_types]);
    }



    public function createClient(Request $request)
    {

        $requestData = $request->all();

        $client_name = $request->client_name;
        $client_email = $request->client_email;
        $client_password_c = $request->client_password;
        $client_password = Hash::make($request->client_password);

        $ntn_number = $request->ntn_number;
        $sales_tax_number = $request->sales_tax;
        $entity_type = $request->entity_type;

        $contact = $request->contact;
        $client_contact_full_name = $request->client_contact_full_name;
        $client_contact_email = $request->client_contact_email;
        $client_designation = $request->client_designation;
        $contact_department = $request->contact_department;
        $contact_email = $request->contact_email;
        $contact_cell = $request->contact_cell;

        $contact_designated_add_1 = $request->contact_designated_add_1;
        $contact_designated_add_2 = $request->contact_designated_add_2;
        $client_designated_city = $request->client_designated_city;

        $other_info_about_client = $request->other_info_about_client;

        $contact_corresponding_add_1 = $request->contact_corresponding_add_1;
        $contact_corresponding_add_2 = $request->contact_corresponding_add_2;
        $contact_corresponding_city = $request->contact_corresponding_city;

        $product_in_charge = $request->product_in_charge;
        $per_item_charge_day = $request->per_item_charge_day;
        $per_item_charge_month = $request->per_item_charge_month;
        $per_item_charge_day_vol = $request->per_item_charge_day_vol;
        $per_item_charge_month_vol = $request->per_item_charge_month_vol;
        $flat_per_item_charge = $request->flat_per_item_charge;
        $vol_based = $request->vol_based;
        $volume_cft = $request->volume_cft;
        $vol_flat_per_item = $request->volume_flat_rate;
        $out_return_plan_flat = $request->out_return_plan_flat;
        $out_return_plan_flat_tiered = $request->out_return_plan_flat;
        $out_return_plan_flat_input = $request->out_return_plan_flat_input;
        $bulk_charge = $request->bulk_charge;
        $bulk_space = $request->bulk_space;
        $storage_plan = $request->storage_plan;
        $flat_per_day = $request->flat_per_day;
        $flat_per_month = $request->flat_per_month;
        $fulfillment_plan = $request->fulfillment_plan_flat;
        $payment_plan = $request->payment_plan;
        $fl_rate = $request->fl_rate;
        $minimum_charge = $request->minimum_charge;

        $to = $client_email;
        $subject = $client_name . " your new account has been created";
        $message = $client_password;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $query =  DB::insert('insert into clients (sch_name, client_email, password, ntn_number,sales_tax_number,legal_type,designated_add_1,designated_add_2,designated_city, product_in_charge, product_out_charge_flat,product_out_flat_rate,product_out_vol,product_out_vol_fl_rate ,storage_plan,per_item_charge, per_item_charge_flat,volume_based,volume_flat_rate,bulk_charge, bulk_space, fulfil_plan, fl_rate, payment_plan, sch_status, sch_flag) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$client_name, $client_email, $client_password, $ntn_number, $sales_tax_number, $entity_type, $contact_designated_add_1, $contact_designated_add_2, $client_designated_city, $product_in_charge,$storage_plan, $per_item_charge, $bulk_charge, $bulk_space, $fulfillment_plan, $fl_rate, $payment_plan, 1, 1]);
        $query = DB::table('clients')->insert(['sch_id' => $client_name, 'sch_name' => $client_name, 'ntn_number' => $ntn_number, 'sales_tax_number' => $sales_tax_number, 'legal_type' => $entity_type, 'designated_add_1' => $contact_designated_add_1, 'designated_add_2' => $contact_designated_add_2, 'designated_city' => $client_designated_city, 'client_email' => $client_email, 'password' => $client_password, 'product_in_charge' => $product_in_charge, 'product_out_charge_flat' => $out_return_plan_flat, 'product_out_flat_rate' => $out_return_plan_flat_input, 'storage_plan' => $storage_plan, 'minimum_per_month' => $minimum_charge, 'per_item_charge_day' => $per_item_charge_day, 'per_item_charge_month' => $per_item_charge_month, 'per_item_charge_day_vol' => $per_item_charge_day_vol, 'per_item_charge_month_vol' => $per_item_charge_month_vol, 'per_item_charge_flat' => $flat_per_item_charge, 'flat_per_day' => $flat_per_day, 'flat_per_month' => $flat_per_month, 'volume_flat_rate' => $vol_flat_per_item, 'bulk_space' => $bulk_space, 'bulk_charge' => $bulk_charge, 'fulfil_plan' => $fulfillment_plan, 'fl_rate' => $fl_rate, 'payment_plan' => $payment_plan, 'sch_status' => 1, 'sch_flag' => 1]);
        Mail::to($to)->send(new SendMail($client_email, $client_password_c));
        $last_client_id = DB::getPDO()->lastInsertId();

        if ($request->fulfillment_plan_flat == '22') {

            $arrayLength = count($request->start_order);
            for ($col = 0; $col < $arrayLength; $col++) {

                $start_order = $request->start_order[$col];
                $end_order = $request->end_order[$col];
                $fee_order = $request->fee_order[$col];


                $users2 = DB::select("INSERT INTO `product_fulfillment_rate`( `client_id`, `start_order`, `end_order`, `fee_order`) VALUES ('$last_client_id','$start_order','$end_order','$fee_order')");
            }
        }



        if ($request->fulfillment_plan_flat == '33') {
            $arrayLength2 = count($request->start_item);
            for ($col2 = 0; $col2 < $arrayLength2; $col2++) {

                $start_item = $request->start_item[$col2];
                $end_item = $request->end_item[$col2];
                $fee_item = $request->fee_item[$col2];


                $users22 = DB::select("INSERT INTO `product_fulfillment_rate_2`( `client_id`, `start_item`, `end_item`, `fee_item`) VALUES ('$last_client_id','$start_item','$end_item','$fee_item')");
            }
        }

        $arrayDynamic = count($request->client_contact_full_name);
        for ($row = 0; $row < $arrayDynamic; $row++) {
            $dynamic_name = $request->client_contact_full_name[$row];
            $dynamic_email = $request->client_contact_email[$row];
            $dynamic_designation = $request->client_designation[$row];
            $dynamic_dep = $request->contact_department[$row];
            $dynamic_cell = $request->contact_cell[$row];
            $dynamic_other = $request->other_contact[$row];
            $dynamic_add_1 = $request->contact_corresponding_add_1[$row];
            $dynamic_add_2 = $request->contact_corresponding_add_2[$row];
            $dynamic_city = $request->contact_corresponding_city[$row];
            $other_info_about_client = $request->other_info_about_client[$row];

            $dynamic_insert = DB::insert('insert into client_other_contact_details (client_id, client_full_name, client_contact_email ,client_designation, client_dep, client_cell, client_other_contact, client_add_1, client_add_2, client_city, other_info_about_client) values (?,?,?,?,?,?,?,?,?,?,?)', [$last_client_id, $dynamic_name, $dynamic_email, $dynamic_designation, $dynamic_dep, $dynamic_cell, $dynamic_other, $dynamic_add_1, $dynamic_add_2, $dynamic_city, $other_info_about_client]);
        }

        if ($request->out_return_plan_flat == '55') {
            $arrayLengthTiered = count($request->start_order_out);
            for ($col3 = 0; $col3 < $arrayLengthTiered; $col3++) {
                $start_order_input = $request->start_order_out[$col3];
                $end_order_out_input = $request->end_order_out[$col3];
                $fee_end_order_out_input = $request->fee_order_out[$col3];

                DB::update("INSERT INTO `client_stock_out_rates`( `client_id`, `start_order`, `end_order`, `fee`) VALUES ('$last_client_id','$start_order_input','$end_order_out_input','$fee_end_order_out_input')");
            }
        }

        if ($query) {
            return redirect()->back()->with('success', 'Successfully created Client Record');
        } else {
            return redirect()->back()->with('danger', 'Failed to create a client');
        }
    }

    public static function fulfilplans($value, $value2)
    {
        $reg_id = session()->get("reg_id");
        $sch_id = session()->get("sch_id");

        if ($value == '22') {
            $users = DB::select("SELECT * from product_fulfillment_rate WHERE  product_fulfillment_rate.client_id='$value2'");
            if (empty($users)) {
                $val = new stdClass();
                $val->start_order = '0';
                $val->end_order = '0';
                $val->fee_order = '0';
                $new_val[] = $val;
                return $new_val;
            } else {
                foreach ($users as $user6) {
                    $val = new stdClass();
                    $val->start_order = $user6->start_order;
                    $val->end_order = $user6->end_order;
                    $val->fee_order = $user6->fee_order;
                    $new_val[] = $val;
                }
                return $new_val;
            }
        }


        if ($value == '33') {
            $users = DB::select("SELECT * from product_fulfillment_rate_2 WHERE  product_fulfillment_rate_2.client_id='$value2'");
            if (empty($users)) {
                $val = new stdClass();
                $val->start_item = '0';
                $val->end_item = '0';
                $val->fee_item = '0';
                $new_val[] = $val;
                return $new_val;
            } else {
                foreach ($users as $user6) {
                    $val = new stdClass();
                    $val->start_item = $user6->start_item;
                    $val->end_item = $user6->end_item;
                    $val->fee_item = $user6->fee_item;
                    $new_val[] = $val;
                }
                return $new_val;
            }
        }
    }

    static function checkUserStockOutRates($client_id)
    {
        $stock_out_rates = DB::select('select * from client_stock_out_rates where client_id = ?', [$client_id]);
        if (empty($stock_out_rates)) {
            $val = new stdClass();
            $val->order = '0';
            $val->end_item = '0';
            $val->fee_item = '0';
            $new_val[] = $val;
            return $new_val;
        } else {
            foreach ($stock_out_rates as $stock_out_rate) {
                $val = new stdClass();
                $val->start_order = $stock_out_rate->start_order;
                $val->end_order = $stock_out_rate->end_order;
                $val->fee = $stock_out_rate->fee;
                $new_val[] = $val;
            }
            return $new_val;
        }
    }




    public function editClientById($sch_id, $schname)
    {
        $users = DB::select("SELECT * from clients WHERE sch_id = $sch_id");
        $legal_types = DB::select('select * from legal_types');
        $user_other_details = DB::select('select * from client_other_contact_details where client_id = ?', [$sch_id]);
        return view('clients.edit-client', ['id' => $sch_id, 'shname' => $schname, 'users' => $users, 'user_other_details' => $user_other_details, 'legal_types' => $legal_types, 'sch_id' => $sch_id]);
    }

    public function clientDetails($sch_id, $schname)
    {
        $users = DB::select("SELECT * from clients WHERE sch_id = $sch_id");
        return view('clients.client-details', ['id' => $sch_id, 'sch_name' => $schname, 'users' => $users]);
    }

    public function updateClient(Request $request)
    {
        $client_name = $request->client_name;
        $client_email = $request->client_email;
        $client_password_c = $request->client_password;
        $client_password = Hash::make($request->client_password);

        $ntn_number = $request->ntn_number;
        $sales_tax_number = $request->sales_tax;
        $entity_type = $request->entity_type;

        $contact = $request->contact;
        $client_contact_full_name = $request->client_contact_full_name;
        $client_contact_email = $request->client_contact_email;
        $client_designation = $request->client_designation;
        $contact_department = $request->contact_department;
        $contact_email = $request->contact_email;
        $contact_cell = $request->contact_cell;

        $contact_designated_add_1 = $request->contact_designated_add_1;
        $contact_designated_add_2 = $request->contact_designated_add_2;
        $client_designated_city = $request->client_designated_city;

        $other_info_about_client = $request->other_info_about_client;

        $contact_corresponding_add_1 = $request->contact_corresponding_add_1;
        $contact_corresponding_add_2 = $request->contact_corresponding_add_2;
        $contact_corresponding_city = $request->contact_corresponding_city;

        $product_in_charge = $request->product_in_charge;
        $per_item_charge_day = $request->per_item_charge_day;
        $per_item_charge_month = $request->per_item_charge_month;
        $per_item_charge_day_vol = $request->per_item_charge_day_vol;
        $per_item_charge_month_vol = $request->per_item_charge_month_vol;
        $flat_per_item_charge = $request->flat_per_item_charge;
        $vol_based = $request->vol_based;
        $volume_cft = $request->volume_cft;
        $vol_flat_per_item = $request->volume_flat_rate;
        $out_return_plan_flat = $request->out_return_plan_flat;
        $out_return_plan_flat_tiered = $request->out_return_plan_flat;
        $out_return_plan_flat_input = $request->out_return_plan_flat_input;
        $bulk_charge = $request->bulk_charge;
        $bulk_space = $request->bulk_space;
        $storage_plan = $request->storage_plan;
        $flat_per_day = $request->flat_per_day;
        $flat_per_month = $request->flat_per_month;
        $fulfillment_plan = $request->fulfillment_plan_flat;
        $payment_plan = $request->payment_plan;
        $fl_rate = $request->fl_rate;
        $minimum_charge = $request->minimum_charge;

        $to = $client_email;
        $subject = $client_name . " your new account has been created";
        $message = $client_password;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $query =  DB::insert('insert into clients (sch_name, client_email, password, ntn_number,sales_tax_number,legal_type,designated_add_1,designated_add_2,designated_city, product_in_charge, product_out_charge_flat,product_out_flat_rate,product_out_vol,product_out_vol_fl_rate ,storage_plan,per_item_charge, per_item_charge_flat,volume_based,volume_flat_rate,bulk_charge, bulk_space, fulfil_plan, fl_rate, payment_plan, sch_status, sch_flag) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$client_name, $client_email, $client_password, $ntn_number, $sales_tax_number, $entity_type, $contact_designated_add_1, $contact_designated_add_2, $client_designated_city, $product_in_charge,$storage_plan, $per_item_charge, $bulk_charge, $bulk_space, $fulfillment_plan, $fl_rate, $payment_plan, 1, 1]);
        // $query = DB::table('clients')->insert(['sch_id' => $client_name, 'sch_name' => $client_name, 'ntn_number' => $ntn_number, 'sales_tax_number' => $sales_tax_number, 'legal_type' => $entity_type, 'designated_add_1' => $contact_designated_add_1, 'designated_add_2' => $contact_designated_add_2, 'designated_city' => $client_designated_city, 'client_email' => $client_email, 'password' => $client_password, 'product_in_charge' => $product_in_charge, 'product_out_charge_flat' => $out_return_plan_flat, 'product_out_flat_rate' => $out_return_plan_flat_input, 'storage_plan' => $storage_plan, 'minimum_per_month' => $minimum_charge, 'per_item_charge_day' => $per_item_charge_day, 'per_item_charge_month' =>$per_item_charge_month , 'per_item_charge_day_vol' => $per_item_charge_day_vol, 'per_item_charge_month_vol' =>$per_item_charge_month_vol ,'per_item_charge_flat' => $flat_per_item_charge, 'flat_per_day' =>$flat_per_day , 'flat_per_month' => $flat_per_month ,'volume_flat_rate' => $vol_flat_per_item, 'bulk_space' => $bulk_space, 'bulk_charge' => $bulk_charge, 'fulfil_plan' => $fulfillment_plan, 'fl_rate' => $fl_rate, 'payment_plan' => $payment_plan, 'sch_status' => 1, 'sch_flag' => 1]);
        $query = DB::select("UPDATE clients SET sch_name = '$client_name', client_email = '$client_email', ntn_number = '$ntn_number',  sales_tax_number = '$sales_tax_number', legal_type = '$entity_type', designated_add_1 = '$contact_designated_add_1', designated_add_2 = '$contact_designated_add_2', designated_city = '$client_designated_city', password = '$client_password',  product_in_charge = '$product_in_charge', product_out_charge_flat = '$out_return_plan_flat', product_out_flat_rate = '$out_return_plan_flat_input', storage_plan = '$storage_plan', minimum_per_month = '$minimum_charge', per_item_charge_day = '$per_item_charge_day', per_item_charge_month = '$per_item_charge_month', per_item_charge_day_vol = '$per_item_charge_day_vol', per_item_charge_flat = '$flat_per_item_charge', flat_per_day = '$flat_per_day', flat_per_month = '$flat_per_month', volume_flat_rate = '$vol_flat_per_item', bulk_space = '$bulk_space', bulk_charge = '$bulk_charge', fulfil_plan = '$fulfillment_plan', fl_rate = '$fl_rate', payment_plan = '$payment_plan', sch_status = '1', sch_flag = '1' where sch_id = '$request->client_id'");
        Mail::to($to)->send(new SendMail($client_email, $client_password_c));
        $last_client_id = DB::getPDO()->lastInsertId();

        if ($request->fulfillment_plan_flat == '22') {

            $arrayLength = count($request->start_order);
            for ($col = 0; $col < $arrayLength; $col++) {

                $start_order = $request->start_order[$col];
                $end_order = $request->end_order[$col];
                $fee_order = $request->fee_order[$col];


                $users2 = DB::select("UPDATE `product_fulfillment_rate` SET ( `client_id`, `start_order`, `end_order`, `fee_order`) VALUES ('$last_client_id','$start_order','$end_order','$fee_order')");
            }
        }



        if ($request->fulfillment_plan_flat == '33') {
            $arrayLength2 = count($request->start_item);
            for ($col2 = 0; $col2 < $arrayLength2; $col2++) {

                $start_item = $request->start_item[$col2];
                $end_item = $request->end_item[$col2];
                $fee_item = $request->fee_item[$col2];


                $users22 = DB::select("UPDATE `product_fulfillment_rate_2` SET ( `client_id`, `start_item`, `end_item`, `fee_item`) VALUES ('$last_client_id','$start_item','$end_item','$fee_item')");
            }
        }

        $arrayDynamic = count($request->client_contact_full_name);
        for ($row = 0; $row < $arrayDynamic; $row++) {
            $dynamic_name = $request->client_contact_full_name[$row];
            $dynamic_email = $request->client_contact_email[$row];
            $dynamic_designation = $request->client_designation[$row];
            $dynamic_dep = $request->contact_department[$row];
            $dynamic_cell = $request->contact_cell[$row];
            $dynamic_other = $request->other_contact[$row];
            $dynamic_add_1 = $request->contact_corresponding_add_1[$row];
            $dynamic_add_2 = $request->contact_corresponding_add_2[$row];
            $dynamic_city = $request->contact_corresponding_city[$row];
            $other_info_about_client = $request->other_info_about_client[$row];

            $dynamic_insert = DB::select("UPDATE client_other_contact_details SET client_full_name = '$dynamic_name' , client_contact_email = '$dynamic_email' ,client_designation = '$dynamic_designation', client_dep = '$dynamic_dep', client_cell = '$dynamic_cell', client_other_contact = '$dynamic_other', client_add_1 = '$dynamic_add_1', client_add_2 = '$dynamic_add_2', client_city = '$dynamic_city', other_info_about_client = '$other_info_about_client' where client_id = '$request->client_id'");
        }

        if ($request->out_return_plan_flat == '66') {
            $arrayLengthTiered = count($request->start_order_out);
            for ($col3 = 0; $col3 < $arrayLengthTiered; $col3++) {
                $start_order_input = $request->start_order_out[$col3];
                $end_order_out_input = $request->end_order_out[$col3];
                $fee_end_order_out_input = $request->fee_order_out[$col3];

                DB::update("UPDATE `client_stock_out_rates` SET ( `client_id`, `start_order`, `end_order`, `fee`) VALUES ('$last_client_id','$start_order_input','$end_order_out_input','$fee_end_order_out_input')");
            }
        }

        return redirect()->back()->with('success', 'Successfully updated Client record');
    }

    public function deleteClientById($sch_id)
    {
        $client = DB::delete('delete from clients where sch_id = ?', [$sch_id]);
        return redirect()->back();
    }

    public function categoryView()
    {
        $client_items = DB::select('select * from item');
        return view('clients.category-view', compact(['client_items']));
    }

    public function getCategoriesIndex()
    {
        $categories = DB::select('select * from categories');
        return view('categories.categories-index', ['categories' => $categories]);
    }

    public function createCategory(Request $request)
    {
        $code = $request->code;
        $type = $request->type;
        $cname = $request->cname;

        DB::select("INSERT INTO `categories`( `category_barcode`, `category_name`, `category_type`) VALUES ('$code','$cname','$type')");

        return redirect()->route('categories', ['sch_id' => $request->client_id]);
    }

    public function editCategoryView($category_id)
    {
        $category = DB::select('select * from categories where id = ?', [$category_id]);

        return view('clients.category-edit', ['category' => $category]);
    }

    public function updateCategory(Request $request)
    {
        $category = DB::select("UPDATE `categories` SET `category_name`='$request->category_name', `category_barcode` = '$request->category_barcode', `category_type` = '$request->category_type' WHERE `id`='$request->category_id'");
        return redirect()->route('categories-index');
    }

    public function deleteCategory($category_id)
    {
        DB::select('delete from categories where id = ?', [$category_id]);
        $client_items = DB::select('select * from item');
        $category = DB::select('select * from categories where id = ?', [$category_id]);
        return redirect()->back();
    }

    public function clientItemAddView($client_id)
    {

        $categories = DB::select('select * from categories');
        return view('clients.item-add', ['sch_id' => $client_id, 'categories' => $categories]);
    }

    public function addClientItem(Request $request)
    {

        $client_id = $request->client_id;
        $product_name = $request->product_name;
        $category_id = $request->category_id;
        $internal_code = $request->internal_code;
        $barcode = $request->product_barcode;
        $picture = $request->file('product_file');
        $image_name = rand() . '.' . $picture->getClientOriginalExtension();
        $picture->move(public_path('uploads'), $image_name);
        $height = $request->p_height;
        $width = $request->p_width;
        $depth = $request->p_depth;
        $weight = $request->p_weight;

        $users = DB::select("INSERT INTO `product_item`(`client_id`,`category_id`,`pitem_title`,`pitem_code`,`length`,`width`,`height`,`weight`,`img`,`in_code`,`fee_plan`,`fl_rate`)
        VALUES ('$client_id',$category_id,'$product_name','$barcode','$depth','$width','$height','$weight','$image_name','$internal_code','$request->fee_plan','$request->fl_rate')");

        if ($request->fl_rate == '') {
            if (!$users) {
                $arrayLength = count($request->start);
                $users1 = DB::select("SELECT product_item.pitem_id from product_item order by product_item.pitem_id desc limit 1");
                foreach ($users1 as $user1) {

                    for ($col = 0; $col < $arrayLength; $col++) {
                        $start = $request->start[$col];
                        $end = $request->end[$col];
                        $fee = $request->fee[$col];
                        $users = DB::select("INSERT INTO `product_items_details`( `client_id`, `start`, `end`, `fee`, `item_id`, 
                           `pitem_id`) VALUES ('$client_id','$start','$end','$fee','$request->item_id','$user1->pitem_id')");
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function getItemEditView($pitem_id)
    {

        $client_items = DB::select('select * from item');
        $users = DB::select('select * from product_item where pitem_id = ?', [$pitem_id]);
        return view('items.item-edit', ['users' => $users]);
    }

    public function product_item_update_cnfrm(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('logo');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $new_name);
        //         $reg_id = implode(",", $request->reg_id);
        //         $sch_id= implode(",", $request->sch_id);





        $users = DB::select("UPDATE `product_item` SET `pitem_title`='$request->item_title',`pitem_code`='$request->code',
              `length`='$request->length',`width`='$request->width',`height`='$request->height',`weight`='$request->weight',
              `img`='$new_name',`in_code`='$request->in_code',`fl_rate`='$request->fl_rate' 
              WHERE pitem_id='$request->pitem_id'");


        return redirect()->route('client-details', ['sch_id' => $request->sch_id_id]);
    }

    public function deleteItem($pitem_id)
    {
        DB::delete('delete from product_item where pitem_id =?', [$pitem_id]);
        return redirect()->back();
    }


    public function getGrnDetailsByClient($sch_id)
    {

        $client_items = DB::select('select * from item');
        $users = DB::select("SELECT sum(grn_details.quantity)as qty,grn.session_id,academic_session.session_number,grn.grn_id,grn.do,grn.po,grn.date_time,grn.todate,vend_name,grn.grn_status FROM `grn`,vendor,grn_details,academic_session WHERE grn.session_id=academic_session.id and grn_flag=1 
           and grn.vend_id=vendor.vend_id and grn.grn_id=grn_details.grn_id and grn.client_id='$sch_id' group by grn_details.grn_id");

        return view("grn.grn-table", ['users' => $users], compact(['sch_id', 'client_items']));
    }

    public  function addGrnView($sch_id)
    {

        $sch_id  = $sch_id;
        $sch_id2 = $sch_id;
        if ($sch_id != '') {
            $users2 = DB::select("SELECT clients.sch_id,clients.sch_name from clients where clients.sch_status='1' and clients.sch_flag='1' and  clients.sch_id='$sch_id'");
        } else if ($sch_id2 != '') {
            $users2 = DB::select("SELECT clients.sch_id,clients.sch_name from clients where clients.sch_status='1' and clients.sch_flag='1' and  clients.sch_id='$sch_id2'");
        } else {

            $users2 = DB::select("SELECT clients.sch_id,clients.sch_name from clients where clients.sch_status='1' and clients.sch_flag='1'");
        }
        $users = DB::select("SELECT grn_id from grn order by grn_id desc limit 1");
        $users1 = DB::select("SELECT vendor.vend_id,vendor.vend_name from vendor");
        $session = DB::select("SELECT academic_session.id,academic_session.session_number from academic_session");

        if (!$users) {
            return view("stock.add-grn", ['grn_id' => 1, 'users1' => $users1, 'users2' => $users2, 'id' => $sch_id, 'sch_id' => $sch_id, 'session' => $session]);
        } else {
            foreach ($users as $user) {
                if ($user->grn_id == '') {
                    $grn_id = '1';
                } else {
                    $grn_id = $user->grn_id + 1;
                }
            }
            return view("stock.add-grn", ['grn_id' => $grn_id, 'users1' => $users1, 'users2' => $users2,  'id' => $sch_id, 'sch_id' => $sch_id, 'session' => $session]);
        }
    }

    public function createGrn(Request $request)
    {
        $lgn_id = Auth::user()->id;
        $users = DB::select("INSERT INTO grn(client_id,vend_id,grn_created_id,do,po,date_time,todate,session_id) VALUES('$request->sch_id','$request->v_id','$lgn_id','$request->do','$request->po',CURRENT_TIMESTAMP,'$request->todate','$request->session_id')");
        $last_id2 = DB::getPDO()->lastInsertId();
        if (!$users) {

            foreach (array_combine($request->code, $request->quantity) as $code => $qty) {
                $users1 = DB::select("INSERT INTO `grn_details`(grn_id, `grnd_code`, `quantity`,
                `total_qty`,rem_stack_fit) VALUES ('$last_id2','$code','$qty','$qty','$qty')");
            }
        }
    }

    public function grn_details($sch_id, $grn_id)
    {
        $users = DB::select("SELECT * from grn,vendor ,clients WHERE  grn.vend_id=vendor.vend_id and grn.client_id=clients.sch_id and grn.grn_id='$grn_id'");

        $users1 = DB::select("SELECT * from grn,grn_details,product_item WHERE grn.grn_id='$grn_id' and 
         grn.grn_id=grn_details.grn_id and grn_details.grnd_code=product_item.pitem_code and product_item.pitem_flag=1 order by grnd_id desc ");
        return view("grn.grn_details", ['users' => $users, 'users1' => $users1, 'id' => $sch_id, 'sch_id' => $sch_id]);
    }

    public function deleteGrn($grn_id)
    {

        DB::delete('delete from grn where grn_id = ?', [$grn_id]);
        DB::delete('delete from grn_details where grn_id = ?', [$grn_id]);

        return redirect()->back();
    }

    public function editGrn($grn_id)
    {
        $users = DB::select("SELECT * from grn WHERE grn.grn_id='$grn_id'");
        $users2 = DB::select("SELECT * from grn_details WHERE grn_details.grn_id='$grn_id' ");
        $users1 = DB::select("SELECT vendor.vend_id,vendor.vend_name from vendor");
        $users3 = DB::select("SELECT clients.sch_id,clients.sch_name from clients");
        $session = DB::select("SELECT academic_session.id,academic_session.session_number from academic_session");
        return view('stock.grn-edit', ['users' => $users, 'users2' => $users2, 'users1' => $users1, 'users3' => $users3, 'session' => $session]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('name');
        return redirect("/");
    }

    public static function get_bin_info($wh_code, $rk_id, $row_id)
    {

        $clasqty = '0';
        $users = DB::select("SELECT * from bin_info  where wh_id='$wh_code' and  rk_id='$rk_id' and  row_id='$row_id'");
        $rowCount = count($users);

        return $rowCount;
    }

    public static function get_bin_info_tt($wh_code, $rk_id, $row_id)
    {


        $users = DB::select("SELECT * from bin_info  where wh_id='$wh_code' and  rk_id='$rk_id' and  row_id='$row_id'");


        return $users;
    }

    public function stockInView(Request $request, $client_id)
    {

        $lgn_id = Auth::user()->id;
        $sch_id  = $client_id;
        $lgn_flag = 1;
        //         if ($lgn_flag == 1 || $lgn_flag == 9) {
        //             $sch_id = $request->sch_id;
        //             if ($request->func == 'out') {

        //                 $users = DB::select("SELECT item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag
        //         FROM item_stock
        //         INNER JOIN grn_details
        //        ON item_stock.grnd_id = grn_details.grnd_id
        //        INNER JOIN grn
        //       ON grn_details.grn_id = grn.grn_id
        //       where item_stock.flag='out' and item_stock.its_flag=1 and grn_created_id='$lgn_id'");
        //                 $users1 = DB::select("SELECT sum(item_stock.quantity)as qty,item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag 
        // FROM `item_stock`,grn_details,grn WHERE item_stock.flag='out' and item_stock.its_flag=1 and item_stock.grnd_id=grn_details.grnd_id and grn_details.grn_id = grn.grn_id and grn_created_id='$lgn_id' GROUP BY grn_details.grnd_code");

        //                 return view("stock.stock-in", ['users' => $users, 'users1' => $users1, 'id' => $sch_id]);
        //             } else {
        $users = DB::select("SELECT item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,item_stock.space_occupied,grn.grn_id,item_stock.flag
        FROM item_stock
        INNER JOIN grn_details
       ON item_stock.grnd_id = grn_details.grnd_id
       INNER JOIN grn
      ON grn_details.grn_id = grn.grn_id
      where item_stock.flag='In' and grn_created_id='$lgn_id'  and grn.client_id ='$sch_id' and item_stock.its_flag=1 ");
        $users1 = DB::select("SELECT sum(item_stock.quantity)as qty,item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag 
FROM `item_stock`,grn_details,grn WHERE item_stock.flag='in' and item_stock.its_flag=1 and item_stock.grnd_id=grn_details.grnd_id and grn_details.grn_id = grn.grn_id and grn_created_id='$lgn_id' and grn.client_id ='$sch_id' GROUP BY grn_details.grnd_code");


        return view("stock.stock-in", ['users' => $users, 'users1' => $users1, 'id' => $sch_id]);
        //             }
        //         } else if ($lgn_flag == 2) {

        //             if ($request->func == 'out') {

        //                 $users = DB::select("SELECT item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag
        //         FROM item_stock
        //         INNER JOIN grn_details
        //        ON item_stock.grnd_id = grn_details.grnd_id
        //        INNER JOIN grn
        //       ON grn_details.grn_id = grn.grn_id
        //       where item_stock.flag='out' and item_stock.its_flag=1 ");
        //                 $users1 = DB::select("SELECT sum(item_stock.quantity)as qty,item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag 
        // FROM `item_stock`,grn_details,grn WHERE item_stock.flag='out' and item_stock.its_flag=1 and item_stock.grnd_id=grn_details.grnd_id and grn_details.grn_id = grn.grn_id  GROUP BY grn_details.grnd_code");

        //                 return view("stock.stock-in", ['users' => $users, 'users1' => $users1]);
        //             } else {
        //                 $users = DB::select("SELECT item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag
        //         FROM item_stock
        //         INNER JOIN grn_details
        //        ON item_stock.grnd_id = grn_details.grnd_id
        //        INNER JOIN grn
        //       ON grn_details.grn_id = grn.grn_id
        //       where item_stock.flag='in'   and grn.sch_id ='$sch_id' and item_stock.its_flag=1 ");
        //                 $users1 = DB::select("SELECT sum(item_stock.quantity)as qty,item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag 
        // FROM `item_stock`,grn_details,grn WHERE item_stock.flag='in' and item_stock.its_flag=1 and item_stock.grnd_id=grn_details.grnd_id and grn_details.grn_id = grn.grn_id and grn.sch_id ='$sch_id' GROUP BY grn_details.grnd_code");

        //                 return view("stock.stock-in", ['users' => $users, 'users1' => $users1]);
        //             }
        //         } else {
        //             if ($request->func == 'out') {
        //                 $users = DB::select("SELECT item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag
        //         FROM item_stock
        //         INNER JOIN grn_details
        //        ON item_stock.grnd_id = grn_details.grnd_id
        //        INNER JOIN grn
        //       ON grn_details.grn_id = grn.grn_id
        //       where item_stock.flag='out' and item_stock.its_flag=1 ");
        //                 $users1 = DB::select("SELECT sum(item_stock.quantity)as qty,item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag 
        // FROM `item_stock`,grn_details,grn WHERE item_stock.flag='out' and item_stock.its_flag=1 and item_stock.grnd_id=grn_details.grnd_id and grn_details.grn_id = grn.grn_id and grn_created_id='$lgn_id'  GROUP BY grn_details.grnd_code");

        //                 return view("stock.stock-in", ['users' => $users, 'users1' => $users1]);
        //             } else {
        //                 $users = DB::select("SELECT item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag
        //         FROM item_stock
        //         INNER JOIN grn_details
        //        ON item_stock.grnd_id = grn_details.grnd_id
        //        INNER JOIN grn
        //       ON grn_details.grn_id = grn.grn_id
        //       where item_stock.flag='in' and item_stock.its_flag=1  and grn.sch_id ='$sch_id' and grn_created_id='$lgn_id'");
        //                 $users1 = DB::select("SELECT sum(item_stock.quantity)as qty,item_stock.its_status,item_stock.its_id,grn_details.grnd_code,grn.vend_id,item_stock.rk_code,item_stock.quantity,grn.grn_id,item_stock.flag 
        // FROM `item_stock`,grn_details,grn WHERE item_stock.flag='in' and item_stock.its_flag=1 and item_stock.grnd_id=grn_details.grnd_id and grn_details.grn_id = grn.grn_id and grn.sch_id ='$sch_id'  and grn_created_id='$lgn_id' GROUP BY grn_details.grnd_code");

        //                 return view("stock.stock-in", ['users' => $users, 'users1' => $users1]);
        //             }
        //         }
    }

    public function push_stock($grnd_id, $product_name, $grnd_code, $qty, $rem, $length, $width, $height, $product_id, $client_id)
    {
        $users = DB::select("SELECT * from rack where wh_id='1'");
        return view("stock.push-stock", ['grnd_id' => $grnd_id, 'product_name' => $product_name, 'grnd_code' => $grnd_code, 'qty' => $qty, 'rem' => $rem, 'id' => $client_id, 'sch_id' => $client_id, 'users' => $users, 'length' => $length, 'width' => $width, 'height' => $height, 'product_id' => $product_id]);
    }

    public function check_rack_qty(Request $request)
    {
        $lgn_id = Auth::user()->id;
        if ($lgn_id == 1) {
            $users1 = DB::select("Select * from bin_info where bin_code='$request->rk_code' and wh_id=1");

            if ($users1) {
                foreach ($users1 as $user) {
                    $user->bin_code;
                    echo "Yes Bin exist in ware house";
                }
            } else {
                echo "sorry bin did not exist in ware house";
            }
        } else {
            $users1 = DB::select("Select * from bin_info where bin_code='$request->rk_code' and wh_id=2");
            if ($users1) {
                foreach ($users1 as $user) {
                    $user->bin_code;
                    echo "Yes Bin exist in ware house";
                }
            } else {
                echo "sorry bin did not exist in ware house";
            }
        }
    }

    public function check_rack_size(Request $request)
    {
        $rack_info = DB::table('rack')->select('*')->where('rack_code', '=', $request->rk_code)->first();
        if (($rack_info->width * $rack_info->height * $rack_info->depth) <= $request->item_size) {
            return 0;
        } else {
            return 1;
        }
    }

    public function push_stack_cnfrm(Request $request)
    {



        $lgn_id = Auth::user()->id;
        $lgn_flag = 1;
        $lgn_sch = $request->client_id;
        $valuebarcode = $request->code;
        $p_qty       = $request->quantity;
        $space_occupied = $request->item_space;

        $bincodearry = $request->rk_code;



        $users = DB::select("UPDATE `grn_details` SET rem_stack_fit='0'  WHERE grnd_id='$request->grnd_id'");


        if ($p_qty != '') {


            $users111 = DB::select("INSERT INTO `item_stock`(`grnd_id`,`product_id`,`rk_code`,`quantity`,`space_occupied`,date_time) VALUES ('$request->grnd_id','$valuebarcode','$bincodearry','$p_qty', '$space_occupied',current_timestamp)");

            $check_plan = DB::select('select * from clients where sch_id = ?', [$lgn_sch]);


            foreach ($check_plan as $plan) {
                if ($plan->storage_plan == 1) {
                    if ($plan->per_item_charge_flat == 111) {
                        $storage_charge = $plan->fl_rate;
                        $product_in_charge = $plan->product_in_charge;
                        $minimum_charge = $plan->minimum_per_month;
                        $sub_total = ($storage_charge + $product_in_charge) * $p_qty;
                        if ($sub_total <= $minimum_charge) {
                            $total_bill = $minimum_charge;
                            $s_b =  DB::select("INSERT INTO `client_stock_in_billing` (`product_code`,`client_id`, `product_barcode`,`product_name`, `rack_code`, `space_occupied`, `quantity`, `product_in_charge`, `storage_charge`, `total_bill`, `status`, `created_at`, `updated_at`) VALUES ('$valuebarcode', '$lgn_sch', '$valuebarcode','$request->product_name', '$bincodearry', '$space_occupied', '$p_qty', '$product_in_charge', '$storage_charge', '$total_bill', 'Placed in holding area', current_timestamp, current_timestamp)");
                        } else if ($sub_total > 50000) {
                            $s_b = DB::select("INSERT INTO `client_stock_in_billing` (`product_code`, `product_name`,`client_id`, `product_barcode`, `rack_code`, `space_occupied`, `quantity`, `product_in_charge`, `storage_charge`, `total_bill`, `status`, `created_at`, `updated_at`) VALUES ('$valuebarcode', '$request->product_name', '$lgn_sch', '$valuebarcode', '$bincodearry', '$space_occupied', '$p_qty', '$product_in_charge', '$storage_charge', '$sub_total', 'Placed in holding area', current_timestamp, current_timestamp)");
                        }
                    } else if ($plan->per_item_charge_flat == 222) {
                        $vol_fl_rate = $plan->volume_flat_rate;
                        $product_in_charge = $plan->product_in_charge;
                        $minimum_charge = $plan->minimum_per_month;
                        $sub_total = ($vol_fl_rate + $product_in_charge) * $p_qty;
                    }
                } else {
                    $storage_space = $plan->bulk_space;
                    $storage_charge = $plan->bulk_charge;
                }
            }

            // total main stock
            $users1 = DB::select("SELECT * from main_stock_total where sch_id ='$lgn_sch'  and cset_code='$valuebarcode'");
            if (!empty($users1)) {
                foreach ($users1 as $user11) {
                    $id = $user11->id;
                    $oldqty = $user11->quantity;
                    $oldtoqty = $user11->total_quantity;
                    $newqty = $oldqty + $p_qty;
                    $newtoqty = $oldtoqty + $p_qty;
                    $users33 = DB::select("UPDATE `main_stock_total` SET quantity='$newqty' , total_quantity='$newtoqty'  where id='$id'");
                }
            } else {
                $users33 = DB::select("INSERT INTO `main_stock_total`(`sch_id`,`cset_code`,`quantity`,`total_quantity`)
      VALUES ('$lgn_sch','$valuebarcode','$p_qty','$p_qty')");
            }
        }

        echo "Product successfully stocked in";
    }

    public static function retv_product_item($value)
    {
        $users1 = DB::select("SELECT * from product_item WHERE product_item.pitem_code='$value' and product_item.pitem_flag='1'");
        return $users1;
    }


    public function generateBill($client_id)
    {
        $stock_in_bill = DB::select('select * from client_stock_in_billing where client_id = ?', [$client_id]);
        return view('clients.stock-in-bill', ['stock_in_bill' => $stock_in_bill]);
    }

    public function getClientProductRequests($client_id)
    {
        $p_requests = DB::select('select * from client_stock_requests where client_id = ?', [$client_id]);
        $product = DB::table('client_stock_requests')->select('*')->where('client_id', '=', $client_id)->first();
        $category = DB::table('categories')->select('*')->where('id', '=', $product->category_id)->get();
        return view('clients.client-product-requests', ['p_requests' => $p_requests, 'category' => $category, 'client_id' => $client_id]);
    }

    public function updateClientRequestedProductStatus($product_id)
    {
        $p_requested = DB::table('client_stock_requests')->select('*')->where('id', '=', $product_id)->first();
        if ($p_requested->status == 0) {
            $p_requested->status = 1;
            $new_status = $p_requested->status;
            $query = DB::select("UPDATE client_stock_requests SET status = '$p_requested->status' where id = '$product_id'");
        }
    }
}
