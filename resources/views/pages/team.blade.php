@extends('layouts.master_home')
@section('title', 'Team')
@section('home_content')

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Team</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Team</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team Message</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
@foreach( $team_detail as $detail)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{asset($detail->image)}}" class="img-fluid" alt="image">

                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4> {{ $detail->name}}</h4>
                <span>{{ $detail->designation}} </span>
              </div>
            </div>
          </div>

     @endforeach  

        </div>

      </div>
    </section><!-- End Our Team Section -->

    
@endsection