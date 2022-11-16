@extends('layout')

@section('content')

<h1>Rendu final</h1>
<div class="card w-25 mx-auto">
    <img class="card-img-top"
         src="{{ $userDesign ? route('imageRenderer', [$t_shirt, $t_shirt->id] ) : route('imageRenderer', $t_shirt) }}"
         alt="Card image cap">
    <div class="card-body">
        <table class="table">
            <thead>
            <th>Sexe</th>
            <th>Couleur</th>
            <th>Taille</th>
            </thead>
            <tbody>
            <td>{{ $t_shirt->sexe =='h' ? "Homme" : "Femme" }}</td>
            <td>{{ $t_shirt->color== 'black' ? "Noir" : "blanc" }}</td>
            <td>{{ $t_shirt->size }}</td>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex flex-row w-50 mx-auto justify-content-center">
    <form method="post" action="{{ route('t-shirt.update', $t_shirt ) }}">
        @csrf
        @method('put')
        <input type="hidden" value="{{ $userDesign }}" name="image">
        <input type="submit" class="btn btn-primary" value="Valider">
    </form>
    <a  class="btn btn-warning" href="">Changer de motif</a>
</div>

@endsection
