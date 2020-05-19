@extends('emails.kajla')

@section('content')

	@include('emails.kajla.contentStart')

<h3>Kedves Játékosunk!</h3>

<p>Az általad feltöltött kép publikálásra került a galériánkban. Kattints a lenti linkre, és oszd meg a képet a Facebook oldaladon.</p>

<a href="#">Megosztom a képet</a>


<p>Üdvözlettel: <br>
A Szervezők
</p>
	@include('emails.kajla.contentEnd')

@stop
