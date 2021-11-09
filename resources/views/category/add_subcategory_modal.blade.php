
<div class="modal fade subcategoryModal" tabindex="-1" role="dialog" aria-labelledby="subcategoriesModalLabel" aria-hidden="true"
data-keyboard="false" data-backdrop="static">

<div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
        <div class="modal-header">
            <h5 id="subcategoriesModalLabel" class="modal-title">
                Add Subcategory
            </h5>
            <button id="modalClose" type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ route('categories.add-subcategory') }}" method="POST" id="subcategories-update-form">
                @csrf
                <input type="hidden" name="category_id">
                <div class="form-group">
                    <label for="Category Name">Category Name</label>
                    <input type="text" name="category_name" placeholder="Enter Category Name"
                        class="form-control">
                    <span class="text-danger error-text category_name_error"></span>
                </div>

                <div class="form-group">
                    <label for="Category Name">Subcategory Name</label>
                    <input type="text" name="subcategory_name" placeholder="Enter subcategory Name"
                        class="form-control">
                    <span class="text-danger error-text subcategory_name_error"></span>
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
