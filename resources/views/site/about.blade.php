@extends('site.master')
@section('title', 'About | ' . env('APP_NAME'))

@section('content')
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>About us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Why Shop With Us
               </h2>
            </div>
            <div class="row">
                @foreach ($abouts as $about)
                <div class="col-md-4">
                    <div class="box ">
                       <div class="img-box" style="font-size: 60px">
                          <?= $about->icon ?>
                       </div>
                       <div class="detail-box">
                          <h5>
                             {{ $about->title }}
                          </h5>
                          <p>
                             {{ $about->description }}
                          </p>
                       </div>
                    </div>
                 </div>
                @endforeach
            </div>
         </div>
      </section>
      <!-- end why section -->
@endsection
