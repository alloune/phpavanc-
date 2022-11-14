@extends('layout')

@section('content')
    <h1 class="">Veuillez choisir une image</h1>
    <h3>Vos précédents choix</h3>

    @if($myData)
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $myData->sexe='h' ? "Homme" : "Femme" }}</li>
                <li class="list-group-item">{{ $myData->color = 'black' ? "Noir" : "blanc" }}</li>
                <li class="list-group-item">{{ $myData->size }}</li>
            </ul>
        </div>
    @endif
    <hr>

    <h1>Liste des images</h1>

    <form method="post" action="{{ route('t-shirt.update', $myData) }}" class="form-group">
        @csrf
        @method('put')
        <div class="d-flex flex-wrap gap-5">
            @for($i = 0; $i < 50; $i++)
                <img src="https://picsum.photos/200?random={{ $i }}">
                <input type="radio" value="https://picsum.photos/200?random={{ $i }}" name="image">
            @endfor
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection
