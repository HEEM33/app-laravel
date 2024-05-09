@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des universités</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Classement des universités</h1>
        <div align="right"><a href="{{ url('/home') }}"  class="btn btn-primary mt-3">Retour</a></div>
        <div class="rankings">
            @foreach($rankings as $ranking)
                <div class="ranking-item">
                    <h3>{{ $ranking->name }}</h3>
                    <p> Moyenne : {{ $ranking->ratings_avg_rating }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>


<script>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
}

.rankings {
    margin-top: 20px;
}

.ranking-item {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
}

.ranking-item h3 {
    margin-top: 0;
}

.ranking-item p {
    margin-bottom: 0;
}

</script>
@endsection
