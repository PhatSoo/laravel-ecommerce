<table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>

        @foreach ($categories as $category)
        <tr>
            <td class="align-middle">{{ $category['name'] }}</td>
            <td class="align-middle">{!! $category['status'] ? '<span
                    class="badge bg-gradient-success text-gray-100">Active</span>' : '<span
                    class="badge bg-gradient-danger text-gray-100">Inactive</span>' !!}</td>
            <td class="align-middle">{{ $category['created_at'] }}</td>
            <td class="align-middle">
                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal"
                    data-target="#update-category-modal-{{ $loop->index }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-wrench"></i>
                    </span>
                    <span class="text">Edit</span>
                </a>

                <form id="deleteForm_{{ $category['id'] }}"
                    action="{{ route('d.product-delete-cate', $category['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $category['id'] }})"
                        class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete</span>
                    </button>
                </form>
            </td>
        </tr>

        <x-dashboard.modals.update-category title="Update Category" :categoryInfo="$category" :key="$loop->index" />
        @endforeach

    </tbody>

    <script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this category?")) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }
    </script>

</table>