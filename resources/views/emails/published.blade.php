@extends('emails.kajla')

@section('content')

	@include('emails.kajla.contentStart')


<p><b>Kedves Játékosunk!</b></p>

<br>
<p>Az általad feltöltött kép publikálásra került a galériánkban. Kattints a lenti linkre, és oszd meg a képet a Facebook oldaladon.</p>

<p>
<a href="https://www.facebook.com/sharer/sharer.php?u={{ route('photo.show', ['id' => $id]) }}">Megosztom a képet</a>
</p>


<p>Üdvözlettel: <br>
A Szervezők
</p>
	@include('emails.kajla.contentEnd')

@stop
