@extends('layouts.app')

@section('title', 'Détails de l\'Université')

@section('content')
<style>
    .rating .fa-star.checked {
    color: gold; 
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<div class="container">
    <h1>Détails de l'Université</h1>
    <div class="row">
    <div align="right"><a href="{{ url('/home') }}"  class="btn btn-primary mt-3">Retour</a></div>

        <div class="col-md-8">
                <div class="card-body">
                    <h5 >{{ $universities->name }}</h5>
                    <p >{{ $universities->description }}</p>
            </div>
            <div class="mt-3">
            <form action="{{ route('universities.rate', ['universities_id' => $universities->id]) }}" method="POST" >
                @csrf
                <label for="rating">Notez cette université :</label>
                <div class="rating">
                    <input type="hidden" id="rating_value" name="rating" value="0">
                    <i class="fa fa-star" data-rating="1"></i>
                    <i class="fa fa-star" data-rating="2"></i>
                    <i class="fa fa-star" data-rating="3"></i>
                    <i class="fa fa-star" data-rating="4"></i>
                    <i class="fa fa-star" data-rating="5"></i>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <form action="{{ route('universities.comments', ['universities_id' => $universities->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                <label for="comments">Laisser un commentaire :</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
 
            </div>
        </div>
        @foreach($comments as $comment)
            <div class="card mt-3">
                <div class="card-body">
                <h5 class="card-title">{{ $comment->user->name }}</h5>
                    <p>{{ $comment->comment }}</p>
                    <p><small>Posté le {{ $comment->created_at->format('d/m/Y H:i') }}</small></p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.rating .fa-star').on('click', function() {
        var rating = $(this).data('rating');
        $('#rating_value').val(rating);
        $('.rating .fa-star').removeClass('checked');
        $(this).addClass('checked').prevAll().addClass('checked');
    });
});
</script>
@endsection
