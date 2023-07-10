@extends('userPages/main')

@section('content')
    @include('userPages/layouts/heroSection')
    @include('userPages/partials/topCategories')
    @include('userPages/layouts/aboutSection')
    @include('userPages/layouts/produkSection')
    @include('userPages/layouts/FAQSection')
    @include('userPages/layouts/tentangKamiSection')
@endsection