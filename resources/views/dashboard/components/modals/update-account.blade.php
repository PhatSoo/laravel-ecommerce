<!-- Modal -->
<div class="modal fade" id="update-account-modal-{{ $key }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form method="POST" action="{{ route('d.user-update', $accountInfo['id']) }}">
                <div class="modal-body">

                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" value="{{ $accountInfo['email'] }}" class="form-control" id="inputEmail"
                            name="email">
                    </div>
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">User name</label>
                        <input type="text" required minlength="3" value="{{ $accountInfo['name'] }}"
                            class="form-control" id="inputUsername" name="name">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" {!!
                            $accountInfo->status ? 'checked' : '' !!}>
                        <label class="custom-control-label" for="customSwitch1">Account Status</label>
                    </div>

                    <div class="mb-3">
                        <label for="inputNewPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="inputNewPassword" name="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" name="confirmPassword">
                    </div>

                    <hr>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Current Password To Submit</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" required>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </ div>
    </div>
