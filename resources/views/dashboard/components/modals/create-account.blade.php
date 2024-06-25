<!-- Modal -->
<div class="modal fade" id="create-account-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form method="POST" action="{{ route('d.user-create') }}">
                <div class="modal-body">

                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">User name</label>
                        <input type="text" class="form-control" id="inputUsername" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" required>
                    </div>
                    <input type="hidden" name="isAdmin" value="{{ $isAdmin }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>