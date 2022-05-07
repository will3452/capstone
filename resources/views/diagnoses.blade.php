<x-layout>
    <style>
        .step{
            width: 25px;
            height: 25px;
            background: #ccc;
            margin-right:10px;
            border-radius: 50%;
        }
        .xactive {
            background: #008CBA;
        }
    </style>
    <div class="card mt-2">
        <div class="card-header">
            Check all the symptoms that you have! 
        </div>
        <div class="card-body pl-5">
            <form action="/diagnoses-process" method="POST">
                @csrf
                @foreach ($symptoms as $symptom)
                    <div class="form-group">
                        <label for="">
                            <input type="checkbox" value="{{ $symptom->id }}" name="symptoms[]" class="mr-2">
                            {{ $symptom->name }}
                        </label>
                    </div>
                @endforeach
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="step xactive"></div>
                        <div class="step"></div>
                    </div>
                    <button class="btn btn-primary">
                        GENERATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>