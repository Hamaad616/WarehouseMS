<div class="modal fade editsubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="editsubcategoriesModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 id="editsubcategoriesModalLabel" class="modal-title">
                    Edit Subcategories
                </h5>
                <button id="modalCloseSubCatEdit" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('categories.edit-subcategory') }}" method="POST" id="editsubcategories-update-form">
                    @csrf
                    <input type="hidden" name="editsubcategory_id">
                    <input type="hidden" name="parent_id">
                    <div class="form-group">
                        <label for="subcategory Name">Subcategory Name</label>
                        <input type="text" name="editsubcategory_name" placeholder="Enter subcategory Name"
                            class="form-control">
                        <span class="text-danger error-text editsubcategory_name_error"></span>
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
