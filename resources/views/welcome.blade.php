@extends('templates.app')

@push('styles')
    <link rel="stylesheet" href="front/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front/assets/css/owl.theme.default.min.css">
@endpush



@push('scripts')
    <script src="front/assets/js/owl.carousel.min.js"></script>
    
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });

     
    </script>
@endpush
@section('content')
        <!-- ========================= preloader start ========================= -->
        {{-- <x-spinner /> --}}
        <!-- preloader end -->
        <!-- ========================= hero-section start ========================= -->
        <section id="home" class="hero-section" style="background-color: #f6f7fe">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="hero-content-wrapper">
                            {{-- <h2 class="mb-25 wow fadeInDown" data-wow-delay=".2s"></h2> --}}
                            <h1 class="mb-25 wow fadeInDown" data-wow-delay=".2s">{{ $home->title }}</h1>
                            <p class="mb-35 wow fadeInLeft" id="text-typed" data-wow-delay=".4s">{{ $home->short_desc }}</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                        <div class="hero-img">
                            <div class="d-inline-block hero-img-right">
                                <img src="{{  url('storage/'.$home->hero_image) }}" alt="" class="image wow fadeInRight" data-wow-delay=".5s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= hero-section end ========================= -->

        <!-- ========================= feature-section start ========================= -->
        <section class="feature-section pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="text font-weight-bold text-uppercase">Info & Pengumuman</p>
                        <h4>Informasi dan Pengumuman Terbaru</h4>
                        <div class="py-4">
                            @foreach ($informations as $information)
                            <div class="card mt-2">
                                <div class="card-body">
                                    <p>{!! Illuminate\Support\Str::limit(Illuminate\Support\Str::markdown($information->description), 200) !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="text font-weight-bold text-uppercase">Agenda</p>
                        <h4>Jadwal dan Agenda Terdekat</h4>
                     
                        <div class="py-4">
                             @for($i = 1; $i < 4; $i++)
                            <div class="card mt-2">
                                <div class="card-body">
                                    <p class="font-weight-bold">Pengambilan raport</p>
                                    <small>10 November 2024</small>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= feature-section end ========================= -->


        <section id="berita" class="pt-50 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text font-weight-bold text-uppercase">Berita terbaru</p>
                            <h4>Update berita terbaru seputar informasi sekolah</h4>
                        </div>
                        <div>
                            <p>Lebih banyak </p>
                        </div>
                    </div>
                </div>
                <div class="row py-4">
                    @forelse($posts as $post)
                          <div class="col-lg-4">
                        <div class="card shadow-md border-0 mb-4">
                            <img src="{{  url('storage/'.$post->attachments[0]) }}" class="card-img-top h-25" alt="...">
                            <div class="card-body">
                                <small class="text-muted mb-2">{{ $post->created_at->format('d M Y') }}</small>
                                <div class="mt-3">
                                    <h4 class="font-size-18">{{ $post->title }}</h4>
                                    <p style="font-size: 13px">{!! Illuminate\Support\Str::limit(Illuminate\Support\Str::markdown($post->description), 100) !!}.</p>
                                </div>
                            </div>
                            <div class="p-3 d-flex justify-content-start">
                                <a href="{{ route('news.show', $post->slug) }}" class="text-decoration-none">Baca selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h4 class="text-center">Tidak ada berita</h4>
                    @endforelse
                </div>
            </div>
        </section>
        
        <!--========================= sambutan-kelapa-sekolah start========================= -->
        <section id="" class="bg-white">
            <div class="about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                          <div class="ratio ratio-16x9">
                            <iframe src="{{ $home->link_youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="border-radius"></iframe>
                          </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-12">
                            <div class="about-content-wrapper">
                                <div class="section-title text-center">
                                    <h3 class="mb-40 wow fadeInRight" data-wow-delay=".4s">Visi Misi</h3>
                                </div>
                                <div class="about-content">
                                    <p class="mb-45 wow fadeInUp" data-wow-delay=".6s">
                                      Visi : <br>
                                        {{ $home->vision }} <br>

                                      Misi :
                                        {!! Illuminate\Support\Str::markdown($home->mission) !!}

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <a href="#" class="scroll-top">
            <i class="lni lni-arrow-up"></i>
        </a>
        

@endsection