<div class="modal fade editUnit" tabindex="-1" role="dialog" aria-labelledby="editUnitModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 id="editUnitModalLabel" class="modal-title">
                    Edit Category
                </h5>
                <button id="modalClose" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('unit.update') }}" method="POST" id="unit-update-form">
                    @csrf
                    <input type="hidden" name="unit_id">
                    <div class="form-group">
                        <label for="Category Name">Unit Name</label>
                        <input type="text" name="unit_name" placeholder="Enter unit Name" class="form-control">
                        <span class="text-danger error-text unit_name_error"></span>
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