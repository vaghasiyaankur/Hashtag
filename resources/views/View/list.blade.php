@foreach ($results as $result)
    
<div class="col-12 hastag-details-box">
    <div class="details-date-view mb-3">
        <h5>29 Dec 2022</h5>
    </div>
    @if ($result->title)
    <div class="title-details-view mb-3">
        <p class="details-pera">{{$result->title}}</p>
    </div>
    @endif
    @if ($result->description)
    <div class="descrip-details-view mb-3">
        <p class="details-pera">{{$result->description}}</p>
    </div>
    @endif
    @if ($result->photos)     
    <div class="photo-details-view">
        <img src="{{ asset('/storage/Hashtag/'. $result->photos) }}" alt="">
    </div>
    @endif
    <div class="hashtag-details-view">
        <p class="details-pera mb-0">Lorem ipsum dolor sit </p>
        <h5 class="hashtag-text">{{$result->hashtag}}</h5>
    </div>
</div>
@endforeach