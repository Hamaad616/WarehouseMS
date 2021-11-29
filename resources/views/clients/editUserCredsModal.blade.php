<div class="modal fade editClient" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 id="editClientModalLabel" class="modal-title">
                    Edit Client Password
                </h5>
                <button id="modalClose" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('client.update-creds') }}" method="POST" id="client-update-creds-form">
                    @csrf
                    <input type="hidden" name="client_id">
                    <div class="form-group">
                        <label>Client Email</label>
                        <input type="email" name="client_email" placeholder="Enter client email" class="form-control" readonly>
                        <span class="text-danger error-text client_email_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Client Password</label>
                        <input type="password" name="client_password" placeholder="Enter client password" class="form-control">
                        <span class="text-danger error-text client_password_error"></span>
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