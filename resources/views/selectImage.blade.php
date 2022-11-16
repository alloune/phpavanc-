@extends('layout')

@section('content')
    <h1 class="w-50 mx-auto">Choix de l'image</h1>


    @if($myData)
        <div class="card w-25 mx-auto">
            <img class="card-img-top"
                 src="{{ $myData->color == 'white' ? '/storage/images/color/TS-white.png' : '/storage/images/color/TS-black.png' }}"
                 alt="Card image cap">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Sexe</th>
                    <th>Couleur</th>
                    <th>Taille</th>
                    </thead>
                    <tbody>
                    <td>{{ $myData->sexe =='h' ? "Homme" : "Femme" }}</td>
                    <td>{{ $myData->color== 'black' ? "Noir" : "blanc" }}</td>
                    <td>{{ $myData->size }}</td>
                    </tbody>
                </table>
            </div>
        </div>

    @endif
    <hr>

    <h1>Liste des images</h1>

    <form method="post" action="{{ route('mergedImage', $myData) }}" enctype="multipart/form-data" class="w-75 mx-auto">
        @csrf
        @method('put')
        <div class="d-flex flex-wrap gap-5">
            @for($i = 0; $i < 10; $i++)
                <img src="https://picsum.photos/200?random={{ $i }}">
                <input type="radio" value="https://picsum.photos/200?random={{ $i }}" name="image">
            @endfor
        </div>
        <hr>
        <h3>Choisir mon propre design</h3>
        <div class="d-flex flex-column">
            <input type="file" accept=".jpg, .png" name="userDesign">
            <input class="w-10 mx-auto btn btn-primary" type="submit">
        </div>

    </form>
@endsection
