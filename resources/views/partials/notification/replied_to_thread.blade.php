<li class="notification-box">
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-3 text-center">
        	<img src="@if ($notification->data['status'] == 1) {{ $notification->data['image'] }} @else {{ Gravatar::get(Auth()->user()->email) }}  @endif" alt="{{ $notification->data['user_name'] }}" class="user-avatar-nav user-challenge">
        </div>    
        <div class="col-lg-8 col-sm-8 col-8">
            <strong class="text-info">{{ $notification->data['user_name'] }}</strong>
            <div>
                Te ha invitado a un desafio llamado <a href="/game/{{ $notification->data['challenge_id']}}">{{ $notification->data['challenge_name'] }}</a>
            </div>
            <small class="text-warning">{{ $notification->created_at }}</small>
        </div>    
    </div>
</li>