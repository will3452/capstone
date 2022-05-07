<x-layout>
    <div class="container">
        <h1 class="mt-2 text-left">
            Profile
        </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 d-flex justify-content-center">
            <img src="{{ $user->picture }}" alt="" style="object-fit: cover;height: 300px;width:300px;border-radius:50%;">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Personal Information
                </div>
                <div class="card-body">
                    <form action="/personal" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="d-block">Update image</label>
                            <input name="image" type="file">

                        </div>

                        <div class="form-group">
                            <x-input-text-required value="{{ $user->first_name }}">First Name|text</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required value="{{ $user->middle_name }}">Middle Name|text</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required value="{{ $user->last_name }}">Last Name|text</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <label for="">Current : <i>{{ $user->birth_date->format('Y/m/d') }}</i></label>
                            <x-input-text-required value="{{ $user->birth_date }}">Birth Date|date</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required value="{{ $user->address }}">Address|text</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Sex
                            </label>
                            <select name="sex" id="" class="custom-select">
                                <option value="male" {{ $user->sex != 'male'?:'selected' }}>Male</option>
                                <option value="female" {{ $user->sex != 'female'?:'selected' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary brn-block">Update Personal</button><button class="ml-2 btn btn-secondary brn-block" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-header">
                    Contact Information
                </div>
                <div class="card-body">
                    <form action="/contact" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <x-input-text value="{{ $user->landline_number }}">Landline Number|number</x-input-text>
                        </div>
                        <div class="form-group">
                            <x-input-text value="{{ $user->cellphone_number }}">Cellphone Number|number</x-input-text>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update Contact</button>
                            <button class="ml-2 btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Account Setting
                </div>
                <div class="card-body">
                    <form action="/account" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <x-input-text-required value="{{ $user->email }}">
                                Email|email
                            </x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required>Old Password|password</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <x-input-text-required>New Password|password</x-input-text-required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update Account</button>
                            <button class="ml-2 btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>