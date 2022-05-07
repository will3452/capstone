<x-layout>
    <style>
        .baloon {
            border-radius: 50px;
            padding: 10px 20px; 
            margin:10px 0px;
        }
        .mychat{
            border-radius: 50px 50px 0px 50px;
            background: rgb(47, 106, 255);
            color: white;
        }
        .other{
            border-radius: 50px 50px 50px 0px;
            background: #ddd;
            color: #222;
        }
    </style>
    <div class="card">
        <div class="card-header">
            Message Doctor
        </div>
        <di class="card-body">
            <div  style="height: 50vh;overflow-y:auto;">
                @foreach ($messages as $message)
                    <div class="baloon {{ $message->sender_id == auth()->id() ? 'mychat':'other' }}">
                        <div>
                            {{ $message->body }}
                        </div>
                        <div class="text-right" id="{{ $loop->last ? 'latest':'' }}">
                            <small style="font-size: 10px;">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                        
                    </div>
                @endforeach
                </div>
            <form action="/messages" method="POST" style="border-top:2px solid #ddd;padding-top:10px;">
                @csrf 
                @method('POST')
                <div class="mb-2">
                    <button
                    type="button"
                    onclick="document.getElementById('message').innerText = 'Need An Appointment.'"
                    class="btn btn-success btn-sm" style="border-radius:50px;"
                    >
                        Need An Appointment.
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <textarea id="message" name="body" required class="form-control" placeholder="Aa"></textarea>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </di>
    </div>
</x-layout>