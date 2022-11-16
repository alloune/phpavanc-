@extends('layout')

@section('content')

    @if($errors->any())
        @dump($errors)
    @endif
    <div class="card w-25 mx-auto">
        <h4>Commande numéro #{{ $order->id }}</h4>
        <img class="card-img-top"
             src="/{{ $order->mergeImageUrl }}"
             alt="Card image cap">
        <div class="card-body">
            <table class="table">
                <thead>
                <th>Sexe</th>
                <th>Couleur</th>
                <th>Taille</th>
                </thead>
                <tbody>
                <td>{{ $order->sexe =='h' ? "Homme" : "Femme" }}</td>
                <td>{{ $order->color== 'black' ? "Noir" : "blanc" }}</td>
                <td>{{ $order->size }}</td>
                </tbody>
            </table>
            <div class="d-flex flex-row justify-content-center">
                <form method="post" action="{{ route('t-shirt.destroy', [ $order->id]) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <a class="btn btn-dark" href="{{ route('getMergeImage', [ $order->id ]) }}">Telecharger l'image</a>
            </div>
        </div>
    </div>
@endsection
