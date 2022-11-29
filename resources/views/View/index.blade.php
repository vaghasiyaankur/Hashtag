@extends('Layout.Master')

@push('css')
    <style>
         section.hashtag-view-section {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }
        .hastag-details-box {
            border: 1px solid lightgray;
            padding: 25px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        .details-date-view h5 {
            font-size: 17px;
            font-weight: 500;
        }
        .title-details-view,.descrip-details-view {
            border: 1px solid lightgray;
            padding: 10px;
            width: 100%;
        }
        .img-with-hastag {
            display: flex;
            border: 1px solid lightgray;
            align-items: center;
            padding: 10px;
        }
        .photo-details-view {
            width: 100%;
            max-width: 160px;
            max-height: 160px;
            margin-right: 12px;
            border: 1px solid #e8e8e8;
        }
        .photo-details-view img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')

<section class="hashtag-view-section">
    <div class="hastag-details-box">
        <div class="details-date-view mb-3">
            <h5>29 Dec 2022</h5>
        </div>
        <div class="title-details-view mb-3">
            <p class="details-pera">Wonderfull profetional career</p>
        </div>
        <div class="descrip-details-view mb-3">
            <p class="details-pera">Cheers for achive it</p>
        </div>    
        <div class="img-with-hastag">
            <div class="photo-details-view">
                <img src="{{ asset('/img/dummy-img.png') }}" alt="">
            </div>       
            <div class="hashtag-details-view">
                <p class="details-pera">Lorem ipsum dolor sit </p>
                <h5 class="hashtag-text">#Wonderfull</h5>
            </div>
        </div>           
    </div>
</section>

@endsection

@push('script')
    
@endpush
