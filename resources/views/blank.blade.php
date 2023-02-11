@extends('layouts.app')
@section('content')
<div class="container">
   <div class="card image-gallery-card direction-rtl">
      <div class="card-body"><img class="mb-3 rounded" src="img/bg-img/13.jpg" alt="">
         <h5>Why do we use it?</h5>
         <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
         <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p><a class="btn btn-primary mb-4" href="#">Get A Quote</a>
         <div class="masonry-content-wrapper gallery-img mb-3">
         <!-- Single Masonry Image --><a class="portfolio-item large single-gallery-item" href="img/bg-img/4.jpg"><img src="img/bg-img/4.jpg" alt="">
            <!-- Fav Icon -->
            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div></a>
         <!-- Single Masonry Image --><a class="portfolio-item small single-gallery-item" href="img/bg-img/5.jpg"><img src="img/bg-img/5.jpg" alt="">
            <!-- Fav Icon -->
            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div></a>
         <!-- Single Masonry Image --><a class="portfolio-item large single-gallery-item" href="img/bg-img/6.jpg"><img src="img/bg-img/6.jpg" alt="">
            <!-- Fav Icon -->
            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div></a>
         <!-- Single Masonry Image --><a class="portfolio-item small single-gallery-item" href="img/bg-img/7.jpg"><img src="img/bg-img/7.jpg" alt="">
            <!-- Fav Icon -->
            <div class="fav-icon shadow"><i class="bi bi-heart-fill"></i></div></a>
         </div>
         <h5>Where can I get some?</h5>
         <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
         <!-- Single Skill Progress Bar -->
         <div class="skill-progress-bar d-flex align-items-center">
         <!-- Skill Icon -->
         <div class="skill-icon shadow-sm p-2">
            <svg class="bi bi-code text-dark" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
            </svg>
         </div>
         <div class="skill-data">
            <!-- Skill Name -->
            <div class="skill-name d-flex align-items-center justify-content-between">
               <p class="mb-1">HTML5</p><small class="mb-1"><span class="counter">78</span>%</small>
            </div>
            <!-- Progress -->
            <div class="progress" style="height: 4px;">
               <div class="progress-bar" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
         </div>
         </div>
         <!-- Single Skill Progress Bar -->
         <div class="skill-progress-bar d-flex align-items-center">
         <!-- Skill Icon -->
         <div class="skill-icon shadow-sm p-2">
            <svg class="bi bi-heart text-danger" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
            </svg>
         </div>
         <div class="skill-data">
            <!-- Skill Name -->
            <div class="skill-name d-flex align-items-center justify-content-between">
               <p class="mb-1">PHP 8</p><small class="mb-1"><span class="counter">96</span>%</small>
            </div>
            <!-- Progress -->
            <div class="progress" style="height: 4px;">
               <div class="progress-bar bg-success" style="width: 96%;" role="progressbar" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
         </div>
         </div>
         <!-- Single Skill Progress Bar -->
         <div class="skill-progress-bar d-flex align-items-center">
         <!-- Skill Icon -->
         <div class="skill-icon shadow-sm p-2">
            <svg class="bi bi-bootstrap text-primary" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M12 1H4a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3zM4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4z"></path>
               <path fill-rule="evenodd" d="M8.537 12H5.062V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396zM6.375 4.658v2.467h1.558c1.16 0 1.764-.428 1.764-1.23 0-.78-.569-1.237-1.541-1.237H6.375zm1.898 6.229H6.375V8.162h1.822c1.236 0 1.887.463 1.887 1.348 0 .896-.627 1.377-1.811 1.377z"></path>
            </svg>
         </div>
         <div class="skill-data">
            <!-- Skill Name -->
            <div class="skill-name d-flex align-items-center justify-content-between">
               <p class="mb-1">Bootstrap 5</p><small class="mb-1"><span class="counter">88</span>%</small>
            </div>
            <!-- Progress -->
            <div class="progress" style="height: 4px;">
               <div class="progress-bar bg-info" style="width: 88%;" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
         </div>
         </div>
         <p class="mb-4">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
         <div class="row">
         <div class="col-4">
            <!-- Single Counter -->
            <div class="single-counter-wrap text-center mb-4"><i class="bi bi-basket mb-2 text-success"></i>
               <h3 class="mb-0 text-success"><span class="counter">1400</span>+</h3>
            </div>
         </div>
         <div class="col-4">
            <!-- Single Counter -->
            <div class="single-counter-wrap text-center mb-4"><i class="bi bi-cup mb-2 text-primary"></i>
               <h4 class="mb-0 text-primary"><span class="counter">16</span>k</h4>
            </div>
         </div>
         <div class="col-4">
            <!-- Single Counter -->
            <div class="single-counter-wrap text-center mb-4"><i class="bi bi-emoji-smile mb-2 text-danger"></i>
               <h3 class="mb-0 text-danger"><span class="counter">963</span>+</h3>
            </div>
         </div>
         </div>
         <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi culpa repellendus voluptatem quod. Minus laudantium voluptatem asperiores! Itaque suscipit eos aliquid.</p>
         <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi culpa repellendus voluptatem quod. Minus laudantium voluptatem asperiores!</p>
      </div>
   </div>
</div>
@endsection
