@extends('emails.kajla')

@section('content')

	@include('emails.kajla.contentStart')

  <h3>Kérjük ellenőrizze az email címét!</h3>
  
  {{ $url }}

	@include('emails.kajla.contentEnd')

@stop
