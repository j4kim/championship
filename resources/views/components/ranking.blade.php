@props(['participants'])

@foreach ($participants as $participant)
<div>
    U: {{ $participant['user_id'] }}
    MJ: {{ $participant['gamesPlayed'] }}
    V: {{ $participant['wins'] }}
    P: {{ $participant['points'] }}
</div>
@endforeach
