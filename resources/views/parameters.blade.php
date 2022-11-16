@extends('layout')

@section('content')

    @if($errors->any())
        @dump($errors)
    @endif

    <h3 class="w-75 mt-5 mx-auto">Paramètre du T-shirt</h3>

    <div class="d-flex mx-auto w-50">

        <form class="row gy-2 gx-3 align-items-center" method="post" action="{{ route('t-shirt.store') }}">
            @method('post')
            @csrf
            <div class="d-flex gap-5 justify-content-center">
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
            </div>
            <div class="d-flex flex-row">
                @foreach($allTShirt as $tShirt)
                        <div class="form-check">
                            <img src="{{ asset(str_replace('public', 'storage', $tShirt )) }}" alt="..." class="w-50 h-100">
                            <input type="radio" id="customRadio{{ array_search($tShirt, $allTShirt) }}" name="color" value="{{ str_replace('.png', '', (str_replace('public/images/color/TS-', '', $tShirt))) }}">
                        </div>
                @endforeach
            </div>

            <div class="d-flex w-50 mx-auto justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
@endsection
