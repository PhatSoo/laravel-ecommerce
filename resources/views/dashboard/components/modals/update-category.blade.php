<!-- Modal -->
<div class="modal fade" id="update-category-modal-{{ $key }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form method="POST" action="{{ route('d.product-update-cate', $categoryInfo['id']) }}">
                <div class="modal-body">

                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Category Name</label>
                        <input type="text" value="{{ $categoryInfo['name'] }}" class="form-control" id="inputName"
                            name="name" required>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" {!!
                            $categoryInfo->status ? 'checked' : '' !!}>
                        <label class="custom-control-label" for="customSwitch1">Category Status</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>