@extends('layout')

@section('content')

    <h1 class="d-flex justify-content-center">Liste des commandes</h1>
    <div class="d-flex justify-content-end m-5">
        <a class="btn btn-dark justify-content-center" href="{{ route('getOrderPdf') }}">Expoter au format PDF la liste des commandes</a>
    </div>

    @if($allOrder)
        <div class="d-flex flex-row flex-wrap gap-5">
            @foreach($allOrder as $order)
                <div class="card w-25 mx-auto">
                    @dd($order->mergeImageUrl)
                    <h4>Commande numéro #{{ $order->id }}</h4>
                    <img class="card-img-top"

                         src="{{ $order->mergeImageUrl }}"
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
                            <a class="btn btn-primary" href="{{ route('t-shirt.show', [ $order->id ]) }}">Détail</a>
                            <form method="post" action="{{ route('t-shirt.destroy', [ $order->id]) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    @endif

    <a class="btn btn-primary" href="/">Retour à l'accueil</a>
@endsection
