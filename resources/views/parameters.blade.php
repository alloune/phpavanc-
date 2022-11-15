@extends('layout')

@section('content')
<h1 class="">Bienvenue sur la page de personnalisation de votre T-shirt</h1>

<hr>

<h1>Informations</h1>

<form method="post" action="{{ route('t-shirt.store') }}" class="form-group">
    @method('post')
    @csrf

    <label class="form-label" for="sexe">Sexe</label>
    <select class="form-control" name="sexe" id="sexe">
        <option value="f">Femme</option>
        <option value="h">Homme</option>
    </select>
    <label class="form-label" for="size">Taille</label>
    <select class="form-control" name="size" id="size">
        <option value="xs">xs</option>
        <option value="s">s</option>
        <option value="m">m</option>
        <option value="l">l</option>
        <option value="xl">xl</option>
        <option value="xll">xxl</option>
    </select>

        <h1>Choix du model</h1>
    <div class="custom-control custom-radio">
        @foreach($allTShirt as $tShirt)
            <label>
                <img src="{{ asset(str_replace('public', 'storage', $tShirt )) }}" alt="..." class="w-25 h-25">
                <input type="radio" id="customRadio{{ array_search($tShirt, $allTShirt) }}" name="color" value="{{ str_replace('.png', '', (str_replace('public/images/color/TS-', '', $tShirt))) }}">
            </label>
        @endforeach
    </div>

<input type="submit" class="btn btn-primary" value="Valider">
</form>
@endsection
