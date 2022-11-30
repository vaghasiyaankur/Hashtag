@extends('Layout.Master')

@push('css')
    <style>
         section.hashtag-main-section {
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
        .hashtag-main-section .has-search .form-control {
            padding-left: 38px;
        }
        .hashtag-main-section .has-search .form-control-feedback {
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
        .hashtag-main-section .add-fine-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }  
        .hashtag-main-section .hashtag-tab{
            border: 1px solid lightgray;
            background: #e0e0e054;
            color: #6c757d;
            border-radius: 8px; 
            padding: 10px;
            width: 100%;
            max-width: 690px;
            margin: 0 auto;
            margin-bottom: 20px;
            text-decoration: none;
            display: flex;
        }
        .hashtag-main-section p.list-of-hastag{
            margin-bottom: 0;
        }
    </style>
@endpush

@section('content')

<section class="hashtag-main-section">
    <div class="row">
        <div class="col-12 add-fine-button">
            <div class="add-hastag">
                <button type="button" class="btn btn-secondary">Add</button>
            </div>
            <div class="find-hastag ms-1 ">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
        <div class="col-12 px-0">
            @foreach ($results as $result)     
                <a href="{{url('/view?page=1&search='.$result)}}" class="hashtag-tab">
                    <p class="list-of-hastag">#{{$result}}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('script')
    
@endpush