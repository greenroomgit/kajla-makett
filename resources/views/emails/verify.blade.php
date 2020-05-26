@extends('emails.kajla')

@section('content')

	@include('emails.kajla.contentStart')

<p><b>Kedves Játékosunk!</b></p>

<br>

<p>A makett csomag igénylés véglegesítéshez kérjük, kattints a lenti linkre:</p>

  <p><a href="{{ $url }}">Makett csomag igénylés</a></p>


<p>Üdvözlettel: <br>
A Szervezők
</p>
  

	@include('emails.kajla.contentEnd')

@stop
