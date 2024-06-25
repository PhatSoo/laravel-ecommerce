<table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>

        @foreach ($accounts as $account)
        <tr>
            <td class="align-middle">{{ $account['name'] }}</td>
            <td class="align-middle">{{ $account['email'] }}</td>
            <td class="align-middle">{!! $account['email_verified_at'] ? '<span
                    class="badge bg-gradient-success text-gray-100">Verified</span>'
                : '<span class="badge bg-gradient-warning text-gray-100">Not Verify</span>' !!}
            </td>
            <td class="align-middle">{!! $account['status'] ? '<span
                    class="badge bg-gradient-success text-gray-100">Active</span>' : '<span
                    class="badge bg-gradient-danger text-gray-100">Inactive</span>' !!}</td>
            <td class="align-middle">{{ $account['created_at'] }}</td>
            <td class="align-middle">
                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal"
                    data-target="#update-account-modal-{{ $loop->index }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-wrench"></i>
                    </span>
                    <span class="text">Edit</span>
                </a>

                <form id="deleteForm_{{ $account['id'] }}" action="{{ route('d.user-delete', $account['id']) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $account['id'] }})"
                        class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete</span>
                    </button>
                </form>
            </td>
        </tr>

        <x-dashboard.modals.update-account title="Update Account" :accountInfo="$account" :key="$loop->index" />
        @endforeach

    </tbody>

    <script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this user?")) {
            document.getElementById('deleteForm_' + id).submit();
        }
    }
    </script>

</table>