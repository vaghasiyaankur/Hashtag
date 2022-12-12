@extends('Layout.Master')

@push('css')
    <style>
         section.hashtag-form-section {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }

        .hashtag-form-section .form-details {
            border: 1px solid lightgray;
            background: #e0e0e054;
            padding: 15px;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
@endpush

@section('content')

<section class="hashtag-form-section ">
    <div class="form-details">
        <div class="form-title">
           <div class="button-with-title">
           </div>
            <div class="alert alert-dismissible fade show m-0 py-2 mb-1 d-none showMessage" role="alert">
                <span id="tags-error"></span>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-input-box">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label fieldlabels">Password :</label>
                            <input type="password" class="form-control password" id="passwordInput"
                                placeholder="Enter Your Password" name="password">
                            @if ($errors->any())
                                <span class="text-danger">{{ $errors->first() }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="my-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary submitForm">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push('script')
    
@endpush