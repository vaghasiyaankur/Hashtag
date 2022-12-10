@extends('Layout.Master')

@push('css')
    <style>
        section.hashtag-view-section {
            width: 100%;
            max-width: 690px;
            margin: 0 auto;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            padding: 35px;
        }
        
        .hastag-details-box {
            border: 1px solid lightgray;
            background: #e0e0e054;
            padding: 25px;
            width: 100%;
            max-width: 690px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .hashtag-view-section .details-date-view h5 {
            font-size: 17px;
            font-weight: 500;
        }

        .hashtag-view-section .title-details-view,
        .hashtag-view-section .descrip-details-view {
            border: 1px solid lightgray;
            padding: 10px;
            width: 100%;
        }

        .hashtag-view-section .photo-details-view {
            width: 100%;
            max-width: 80px;
            max-height: 80px;
            margin:0 auto;
            border: 1px solid #e8e8e8;
            position: relative;
        }

        .hashtag-view-section .photo-details-view img {
            width: 100%;
            height: 100%;
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
        }
        .hashtag-view-section .download-icon i{
            font-size: 13px;
            color: #605e5e;
            margin-bottom: 6px;
        }
        .download-icon {
            position: absolute;
            right: -5px;
            top: -5px;
            border-radius: 50%;
            background: #e5e5e5;
            border: 1px solid #787a8d66;
            width: 100%;
            max-width: 20px;
            height: 100%;
            max-height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hashtag-view-section .hashtag-details-view {
            margin: 0 auto;
            text-align: center;
            padding-top: 10px;
        }

        .hashtag-view-section p.details-pera {
            margin-bottom: 0;
            font-size: 15px;
        }

        .hashtag-view-section h5.hashtag-text {
            font-size: 15px;
            font-weight: 600;
        }

        .hashtag-view-section .has-search .form-control {
            padding-left: 38px;
        }

        .hashtag-view-section .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 38px;
            height: 38px;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        .hashtag-view-section .add-fine-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }       
    </style>
@endpush

@section('content')
    <section class="hashtag-view-section">
        <div class="row">
            <div class="col-12 add-fine-button">
                <div class="add-hastag">
                    <a href="{{ route('show.form') }}" class="btn btn-secondary">Add</a>
                </div>
                <div class="find-hastag ms-1 ">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control searchInput" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="hashtag-view-section-main px-0">
                
                {{-- <div class="col-12 hastag-details-box">
                    <div class="details-date-view mb-3">
                        <h5>29 Dec 2022</h5>
                    </div>
                    <div class="title-details-view mb-3">
                        <p class="details-pera">Wonderfull profetional career</p>
                    </div>
                    <div class="descrip-details-view mb-3">
                        <p class="details-pera">Cheers for achive it</p>
                    </div>
                    <div class="photo-details-view">
                        <img src="{{ asset('/img/dummy-img.png') }}" alt="">
                         <div class="download-icon">
                            <a href="javascript:;">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="hashtag-details-view">
                        <p class="details-pera mb-0">Lorem ipsum dolor sit </p>
                        <h5 class="hashtag-text">#Wonderfull</h5>
                    </div>
                </div> --}}

            </div>

        </div>
    </section>
@endsection

@push('script')
<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            infinteLoadMore(page, 'scroll');
        }
    });

    function infinteLoadMore(page, action) {    
        var searchValue =  $('.searchInput').val();
        $.ajax({
            url: ENDPOINT + "/view?page=" + page + '&search=' + searchValue,
            datatype: "html",
            type: "get",
            beforeSend: function() {
                $('.auto-load').show();
            }
        })
        .done(function(response) {
            if (response.length == 0 && action == "scroll") {
                $('.auto-load').html("We don't have more data to display :(");
                return;
            }else if(response.length == 0 && action == "search"){
                $('.hashtag-view-section-main').html("We don't have more data to display :(");
                return;
            }
            $('.auto-load').hide();
            if(action == 'scroll') $(".hashtag-view-section-main").append(response);
            else $(".hashtag-view-section-main").html(response);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }

    $(document).on('keyup', '.searchInput', function() {
        page = 1;
        // $('.hastag-details-box').remove();
        infinteLoadMore(page = 1, 'search');
    }); 

    // home page search hashtag
    let propertyTypeData = new URLSearchParams(window.location.search);
    
    if(propertyTypeData && propertyTypeData.has('search')){
        var hashtagName = propertyTypeData.get('search');
        $('.searchInput').val(hashtagName);
        page = 1;
        infinteLoadMore(page = 1, 'search');
    }
</script>
@endpush
