@extends('layout')

@section('content')

    <h1 class="d-flex justify-content-center">Liste des commandes</h1>
    <div class="d-flex justify-content-center">
        <button class="btn btn-dark justify-content-center">Expoter au format PDF la liste des commandes</button>
    </div>

    @if($allOrder)
        <div class="d-flex flex-row flex-wrap gap-5">
            @foreach($allOrder as $order)
                <div class="card" style="width: 18rem;">
                    <h4>Commande numéro #{{ $order->id }}</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $order->sexe =='h' ? "Homme" : "Femme" }}</li>
                        <li class="list-group-item">{{ $order->color == 'black' ? "Noir" : "blanc" }}</li>
                        <li class="list-group-item">{{ $order->size }}</li>
                        <li class="list-group-item"><img src="{{ $order->mergeImageUrl }}"></li>
                    </ul>
                    <div class="d-flex flex-row justify-content-center">
                        <a class="btn btn-primary" href="{{ route('t-shirt.show', [ $order->id ]) }}">Détail</a>
                        <form method="post" action="{{ route('t-shirt.destroy', [ $order->id]) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a class="btn btn-primary" href="/">Retour à l'accueil</a>
@endsection
