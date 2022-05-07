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
            Result ({{ count($diagnoses) }})
        </div>
        <div class="card-body">
            <form action="/diagnoses-process" method="POST">
                @csrf
                @forelse ($diagnoses as $key=>$diagnosis)
                    <div class="card mt-2">
                        <div class="card-header">
                            Result #{{ $key+1 }}
                        </div>
                        <div class="card-body">
                           <div>
                                Name: <b>{{ $diagnosis->name }}</b>
                           </div>
                           <div style="border-top:2px solid #ddd;" class="mt-2 pt-2">
                               <div>
                                   Symptom/s : 
                               </div>
                               <div>
                                   <ul>
                                       @foreach ($diagnosis->symptoms as $s)
                                           <li>
                                               {{ $s->name }}
                                           </li>
                                       @endforeach
                                   </ul>
                               </div>
                           </div>
                           <div style="border-top:2px solid #ddd;" class="mt-2 pt-2">
                               <div>
                                   Medicine/s : 
                               </div>
                               <div>
                                   <ul>
                                       @forelse ($diagnosis->medicines as $m)
                                           <li>
                                               {{ $m->name }}
                                           </li>
                                        @empty 
                                           <li>
                                               N/a
                                           </li>
                                       @endforelse
                                   </ul>
                               </div>
                           </div>
                        </div>
                    </div>

                @empty
                No result found!
                @endforelse
                <div class="d-flex justify-content-between mt-2">
                    <div class="d-flex">
                        <div class="step"></div>
                        <div class="step xactive"></div>
                    </div>
                    <div>
                        <a href="/diagnoses" class="btn btn-secondary">
                            BACK
                        </a>
                        @livewire('call-doctor')
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>