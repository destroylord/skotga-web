@extends('templates.app')

@section('content')
    <section class="pt-150 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="col-lg-6">
                        <img src="{{  url('storage/'.$post->attachments[0]) }}" class="card-img-top h-full mb-2" alt="...">
                        <small>{{ $post->created_at->format('d M Y') }}</small>
                        {{-- divv     --}}
                        <h3 class="mt-4">{{ $post->title }}</h3>
                        <p class="mt-2" style="text-justify: inter-word">
                            {!! Illuminate\Support\Str::markdown($post->description) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="section-title d-flex justify-content-between">
                        <h3 class="mb-4 wow fadeInRight" data-wow-delay=".4s">Berita Lainnya</h3>
                        <a href="#" class="wow fadeInRight" data-wow-delay=".6s">Lebih banyak</a>
                    </div>

                    <div class="row">

                    
                        @forelse($posts as $post)
                            <div class="col-lg-3">
                                <div class="blog-card">
                                    <div class="blog-img">
                                        <img src="{{  url('storage/'.$post->attachments[0]) }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="blog-content">
                                        <small class="text-muted mb-2">{{ $post->created_at->format('d M Y') }}</small>
                                        <div class="mt-3">
                                            <h4 class="font-size-18">{{ $post->title }}</h4>
                                            <p style="font-size: 13px">{!! Illuminate\Support\Str::limit(Illuminate\Support\Str::markdown($post->description), 150) !!}.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('news.show', $post->slug) }}" class="text-decoration-none">Baca Lebih Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-center">Tidak ada berita</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection