<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
      <a class="navbar-brand" href="#">{{ nova_get_setting('system_name', config('app.name')) }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item active">
                        <a  href="/home" class="nav-link {{ url()->current() != url('home')?:'current-active' }}">Home</a>
                </li>
<!--                <li class="nav-item active">
                        <a  href="/diagnoses-list" class="nav-link {{ url()->current() != url('diagnoses-list')?:'current-active' }}"">Diagnoses</a>
                </li>
                <li class="nav-item active">
                        <a  href="/appointments" class="nav-link {{ url()->current() != url('appointments')?:'current-active' }}">Appointments</a>
                </li>
                <li class="nav-item active">
                        <a  href="/messages" class="nav-link {{ url()->current() != url('messages')?:'current-active' }}">Messages</a>
                </li>
                      -->
                  <li class="nav-item active">
                <a  href="/profile/{{ auth()->user()->email }}" class="nav-link {{ url()->current() != url("/profile/".auth()->user()->email)?:'current-active' }}">Profile</a>
                </li>
                <li class="nav-item active">
                    <a href="/logout" class="nav-link">
                        Logout
                    </a>
                </li>
            @endauth
        </ul>
    </div>

  </div>
</nav>