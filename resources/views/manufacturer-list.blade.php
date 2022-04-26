<x-website-layout>
    <x-slot name="pageTitle">Home | {{ config('app.name') }}</x-slot>
    <section class="hero" style="min-height: 400px">
        <div class="container">
            <form action="" class="search-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div class="title">
                                <h2>Radio codes at your finger tips</h2>
                                <p>We offer a wide range of radio codes for different brands of vehicles.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <main>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            @foreach ($manufacturers as $item)
                <div class="col-md-2">
                    <a class="card card-link" href="{{ route('radio-code-order.show', $item) }}">
                        <img src="{{ $item->logo_url }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body text-center">
                            <h3 class="title">{{ $item->title }}</h3>
                            <p class="description">{{ Str::substr($item->description, 0, 120) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
</x-website-layout>
