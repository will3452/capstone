<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Forgot Password
                </div>
                <div class="card-body">
                    <form action="/change-password" method="POST">
                        @csrf 
                        <div class="form-group">
                            <x-input-text-required placeholder="Enter your Email" value="{{ request()->email }}">
                                Email
                            </x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required placeholder="New Password">
                                 Password|password
                            </x-input-text-required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>