@extends('layouts.layout')
@section('title')
    PcShop - Author
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6"><img src="{{ asset('img/ja.jpeg') }}" /></div>
        <div class="col-md-6 text-center d-flex align-items-center">
            I am currently a student at Visoka ICT, and this is my final year. This journey has been a pleasant one, where I
            got a change to learn a lot about mu passion which is programming.
            <a href="{{ asset('doc.pdf') }}">Dokumentacija</a>
        </div>
    </div>
@endsection
