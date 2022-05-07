<x-layout>
    <h1 class="text-center mt-2">
        Register
    </h1>
    <form action="/register" method="POST">
        @csrf 
        @method('POST')
        <div class="row">
            <div class="col-md-4">
                <x-input-text-required placeholder="Juan">
                    First Name
                </x-input-text-required>
            </div>
            <div class="col-md-4">
                <x-input-text-required placeholder="Miguel">
                    Middle Name
                </x-input-text-required>
            </div>
            <div class="col-md-4">
                <x-input-text-required placeholder="Dela Cruz">
                    Last Name
                </x-input-text-required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-input-text-required>
                    Birth Date|date
                </x-input-text-required>
            </div>
            <div class="col-md-6">
                <label for="">
                    Sex <span class="text-danger">*</span>
                </label>
                <select name="sex" id="" class="custom-select">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-input-text placeholder="in kg" >Weight|Number</x-input-text>
            </div>
            <div class="col-md-6">
                <x-input-text placeholder="in cm">Height|Number</x-input-text>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-input-text placeholder="*******">
                    Landline Number
                </x-input-text>
            </div>
            <div class="col-md-6">
                <x-input-text placeholder="+639*********">
                    Cellphone Number
                </x-input-text>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-input-text-required placeholder="[Blk., Prk.], [Brgy], [Municipality], [City] - [postal code]">
                    Address
                </x-input-text-required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-input-text-required placeholder="juan.delacruz@gmail.com">
                    Email|email
                </x-input-text-required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-input-text-required placeholder="Min. of 8 characters">
                    Password|password
                </x-input-text-required>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">
                Register
            </button>
        </div>
        <div class="text-center">
            <a href="/login">Already have An Account? </a>
        </div>
    </form>
</x-layout>