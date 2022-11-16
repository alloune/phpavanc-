@extends('layout')

@section('content')
    <h1 class="">Bienvenue sur la page de personnalisation de votre T-shirt</h1>

    <hr>

    <h1>Informations</h1>
    @if($errors->any())
        @dump($errors)
    @endif

    <form class="row gy-2 gx-3 align-items-center" method="post" action="{{ route('t-shirt.store') }}">
        @method('post')
        @csrf
        <div class="col-auto">
            <div class="form-outline">
                <label class="form-label" for="form11Example1">Sexe</label>
                <select class="form-control" name="sexe">
                    <option value="f">Femme</option>
                    <option value="h">Homme</option>
                </select>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-outline">
                <label class="form-label" for="form11Example1">Taille</label>
                <select class="form-control" name="size">
                    <option value="xs">xs</option>
                    <option value="s">s</option>
                    <option value="m">m</option>
                    <option value="l">l</option>
                    <option value="xl">xl</option>
                    <option value="xll">xxl</option>
                </select>
            </div>
        </div>

        @foreach($allTShirt as $tShirt)
            <div class="col-auto">
                <div class="form-check">
                    <img src="{{ asset(str_replace('public', 'storage', $tShirt )) }}" alt="..." class="w-25 h-25">
                    <input type="radio" id="customRadio{{ array_search($tShirt, $allTShirt) }}" name="color" value="{{ str_replace('.png', '', (str_replace('public/images/color/TS-', '', $tShirt))) }}">
                </div>
            </div>
        @endforeach
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
