<div class="modal fade addContact" tabindex="-1" role="dialog" aria-labelledby="addContactModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 id="addContactModalLabel" class="modal-title">
                    Add New Contact
                </h5>
                <button id="modalClose" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('contact.add-new-submit') }}" method="GET" id="add-contact-form">
                    @csrf
                    <input type="hidden" name="client_id">
                    <div class="form-group">
                        <label for="Category Name">Full Contact Name</label>
                        <input type="text" name="full_contact_name" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text full_contact_name_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Contact Email</label>
                        <input type="email" name="contact_email" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text contact_email_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Designation</label>
                        <input type="text" name="contact_designation" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text contact_designation_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Department</label>
                        <input type="text" name="contact_department" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text contact_department_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Cell Number</label>
                        <input type="text" name="contact_cell_number" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text contact_cell_number_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Other Contact</label>
                        <input type="text" name="other_contact" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text other_contact_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Registered Address Line 1</label>
                        <input type="text" name="contact_add_1" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text contact_add_1_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">Registered Address Line 2</label>
                        <input type="text" name="contact_add_2" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text contact_add_2_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="Category Name">City</label>
                        <input type="text" name="contact_city" placeholder="Enter full contact name" class="form-control">
                        <span class="text-danger error-text designated_add_2_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Other Information about client</label>
                        <textarea type="text" name="contact_other_info" placeholder="Enter full contact name" class="form-control"></textarea>
                        <span class="text-danger error-text other_info_error"></span>
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