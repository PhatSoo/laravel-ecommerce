<!-- Modal -->
<div class="modal fade" id="create-product-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form method="POST" action="{{ route('d.product-create') }}">
                <div class="modal-body">

                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="inputName" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputStock" class="form-label">Product Stock</label>
                        <input oninput="this.value = Math.abs(this.value)" type="number" class="form-control"
                            id="inputStock" name="stock" min=0 value=0 required>
                    </div>

                    <div class="mb-3">
                        <label for="selectCate" class="form-label">Product Category</label>
                        <select class="custom-select" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" {!! $loop->index === 0 ? 'selected' : ''
                                !!}>{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>