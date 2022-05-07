<x-layout>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <img src="/login.svg" alt="" class="img-fluid">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Login Here
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf 
                        @method("POST")
                        <div class="form-group">
                            <x-input-text-required>Email</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required>
                                Password|password
                            </x-input-text-required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">
                                LOGIN
                            </button>
                        </div>
                        <div class="form-group text-center">
                            or
                        </div>
                        <div class="form-group">
                            <a href="/register" class="btn btn-secondary btn-block">
                                REGISTER
                            </a>
                        </div>
                    </form>
                    <div class="text-center">
                    <!--    <a href="/forgot-password">Forgot Pasword?</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>