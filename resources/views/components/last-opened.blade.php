@auth
    <div class="card">
        <div class="card-header">
            Last Date Opened
        </div>
        <div class="card-body">
            {{ \Carbon\Carbon::parse(auth()->user()->last_opened)->format('M d, Y - h:i A')  ?? '---'}}
        </div>
    </div>
@endauth