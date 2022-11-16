@extends('layout')

@section('content')
<h1 class="">Bienvenue sur la page de personnalisation de votre T-shirt</h1>

<hr>
<h1>Rendu</h1>
<img src="{{ $userDesign ? route('imageRenderer', [$t_shirt, $t_shirt->id] ) : route('imageRenderer', $t_shirt) }}" alt="test">
    <form method="post" action="{{ route('t-shirt.update', $t_shirt ) }}">
        @csrf
        @method('put')
        <input type="hidden" value="{{ $userDesign }}" name="image">
        <input type="submit" class="btn btn-primary" value="Valider">
    </form>
<a  class="btn btn-warning" href="">Changer de motif</a>
@endsection
