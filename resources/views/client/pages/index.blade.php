@extends('client.layout.master')
@section('content')
    <!-- Start Banner Area -->
    @include('client.blocks.banner')
    <!-- End Banner Area -->

    <!-- Start About Area  -->
    @include('client.blocks.about')
    <!-- End About Area  -->

    <!-- Start category Area -->
    @include('client.blocks.category')
    <!-- End Service Area -->

    <!-- Start teacher list Area  -->
    @include('client.blocks.teacher')
    <!-- End teacher list Area  -->

    <!-- Start Blog Style -->
    @include('client.blocks.blog')
    <!-- End Blog Style -->

    <!-- Start Newsletter -->
    @include('client.blocks.newsletter')
    <!-- End Newsletter -->
@endsection
