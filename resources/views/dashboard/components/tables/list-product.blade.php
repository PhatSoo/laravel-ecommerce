<table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>

        @foreach ($products as $product)
        @php $categoryName = $categories->firstWhere('id', $product['category_id'])['name'] @endphp
        <tr>
            <td class="align-middle">{{ $product['name'] }}</td>
            <td class="align-middle">{{ $categoryName }}</td>
            <td class="align-middle">{{ $product['stock'] }}</td>
            <td class="align-middle">{!! $product['status'] ? '<span
                    class="badge bg-gradient-success text-gray-100">Active</span>' : '<span
                    class="badge bg-gradient-danger text-gray-100">Inactive</span>' !!}</td>
            <td class="align-middle">{{ $product['created_at'] }}</td>
            <td class="align-middle">
                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal"
                    data-target="#update-product-modal-{{ $loop->index }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-wrench"></i>
                    </span>
                    <span class="text">Edit</span>
                </a>

                <form id="deleteForm_{{ $product['id'] }}" action="{{ route('d.product-delete', $product['id']) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $product['id'] }})"
                        class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete</span>
                    </button>
                </form>
            </td>
        </tr>
        <x-dashboard.modals.update-product title="Update Product" :productInfo="$product" :$categories
            :key="$loop->index" />
        @endforeach

    </tbody>

    <script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this product?")) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }
    </script>


</table>
