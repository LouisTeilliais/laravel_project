@extends('layouts.app')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

    @section('content')
        <ul>
            <li>
                <a href=" {{ route('sirop.index')}}">Voir les sirops</a>
            </li>
            <li>
                <a href=" {{ route('softs.index')}}">Voir les softs</a>
            </li>
            <li>
                <a href=" {{ route('fruits.index')}}">Voir les fruits</a>
            </li>
            <li>
                <a href=" {{ route('type.index')}}">Voir les types d'alcools</a>
            </li>
            <li>
                <a href=" {{ route('glasse.index')}}">Voir les types de verres</a>
            </li>
            <li>
                <a href=" {{ route('brand.index')}}">Voir les marques d'alcool</a>
            </li>
            <li>
                <a href=" {{ route('fruits.front')}}">Front</a>
            </li>
        </ul>
    </div>
    @endsection

