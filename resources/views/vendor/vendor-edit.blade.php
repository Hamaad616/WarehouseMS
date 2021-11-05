

<div class="modal fade editVendors" tabindex="-1" role="dialog" aria-labelledby="editVendorsModalLabel" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 id="editVendorsModalLabel" class="modal-title">
                    Edit Vendor
                </h5>
                <button id="modalClose" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= route('vendors.update') ?>" method="POST" id="vendors-update-form">
                    @csrf
                    <input type="hidden" name="vendor_id">
                    <div class="form-group">
                        <label for="Vendor Name">Vendor Name</label>
                        <input type="text" name="vendor_name" placeholder="Enter Vendor Name"
                            class="form-control">
                        <span class="text-danger error-text vendor_name_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Vendor Email">Vendor Email</label>
                        <input type="text" name="vendor_email" class="form-control"
                            placeholder="Enter vendor email">
                        <span class="text-danger error-text vendor_email_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Vendor Contact">Vendor Contact Person</label>
                        <input type="text" name="vendor_contact_person" class="form-control"
                            placeholder="Enter vendor contact person">
                        <span class="text-danger error-text vendor_contact_person_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Vendor Contact">Vendor Number</label>
                        <input type="text" name="vendor_number" class="form-control"
                            placeholder="Enter vendor number">
                        <span class="text-danger error-text vendor_number_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Vendor Address">Vendor Address</label>
                        <input type="text" name="vendor_address" class="form-control"
                            placeholder="Enter vendor address">
                        <span class="text-danger error-text vendor_address_error"></span>
                    </div>

                    <div class="form-group">
                        <div class="d-grid gap-2">
                            <button class="btn btn-block btn-sm btn-success" type="submit">Save</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
