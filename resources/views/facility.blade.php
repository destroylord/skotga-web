@extends('templates.app')


@push('styles')
    <style>
         .card:hover .card-title {
            display: block;
        }
    </style>
@endpush
@section('content')

    <section class="page-banner-section">

            <div class="container">
                <div class="row">
                    @foreach ($facilities as $facility)
                    <div class="col-lg-3">
                        <div class="card">
                        <img src="{{  url('storage/'.$facility->image) }}" class="card-img-top h-25" alt="Gambar 1" title="Gambar 1">
                        <div class="card-body">
                            <h5 class="card-title" style="display: none;">{{ $facility->title }}</h5>
                        </div>

                        </div>
                    </div>
                    @endforeach 
                </div>
              
            </div>
    </section>

@endsection