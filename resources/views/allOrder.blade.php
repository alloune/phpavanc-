@extends('layout')

@section('content')

    <h1 class="d-flex justify-content-center">Liste des commandes</h1>

    @if($allOrder)
        <div class="d-flex flex-row flex-wrap gap-5">
            @foreach($allOrder as $order)
                <div class="card" style="width: 18rem;">
                    <h4>Commande numéro #{{ $order->id }}</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $order->sexe='h' ? "Homme" : "Femme" }}</li>
                        <li class="list-group-item">{{ $order->color = 'black' ? "Noir" : "blanc" }}</li>
                        <li class="list-group-item">{{ $order->size }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    @endif

<a class="btn btn-primary" href="/">Retour à l'accueil</a>
@endsection
