@extends('emails.kajla')

@section('content')

	@include('emails.kajla.contentStart')

<h3>Kedves Igénylő!</h3>

<p>A makett csomag igénylés véglegesítéshez kérjük, kattints a lenti linkre:</p>

  <p>{{ $url }}</p>


<p>Üdvözlettel: <br>
A Szervezők
</p>
  

	@include('emails.kajla.contentEnd')

@stop
