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

        .hashtag-form-section .form-title h5 {
            font-size: 21px;
        }
        .hashtag-form-section .form-input-box .fieldlabels{
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
        }
        .hashtag-form-section .form-input-box input{
            outline: none;
        }
        .hashtag-form-section .form-control:focus{
            outline: none;
        }

        .form-control:focus {
            outline: none;
        }
        .hashtag-form-section .form-details .form-title {
            min-height: 76px;
        }
        /* hashtag-add-field */
        .hashtag-form-section .tags {
            background: none repeat scroll 0 0 #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            padding: 0.5em;
            width: 100%;
        }

        .hashtag-form-section .tags li.tagAdd,
        .hashtag-form-section .tags li.addedTag {
            float: left;
            margin-left: 0.25em;
            margin-right: 0.25em;
        }

        .hashtag-form-section .tags li.addedTag {
            background: none repeat scroll 0 0 #eaeaea;
            border-radius: 5px;
            border: 1px solid lightgray;
            color: #000;
            padding: 4px;
            margin: 4px;
            overflow: auto;
        }

        .hashtag-form-section .tags input,
        .hashtag-form-section li.addedTag {
            border: 1px solid lightgray;
            border-radius: 2px;
            box-shadow: none;
            display: block;
            padding: 4px;
        }

        .hashtag-form-section .tags input:hover {
            border: 1px solid #c9c9c9;
        }

        .hashtag-form-section span.tagRemove {
            cursor: pointer;
            display: inline-block;
            padding-left: 0.5em;
        }

        .hashtag-form-section span.tagRemove:hover {
            color: #222222;
        }

        .hashtag-form-section P,
        .hashtag-form-section H1 {
            text-align: center;
        }

        .hashtag-form-section p {
            color: #ccc;
        }

        .hashtag-form-section h1 {
            color: #6b6b6b;
            font-size: 1.5em;
        }
        .hashtag-form-section button.btn.btn-secondary.submitForm {
            width: 100%;
            max-width: 135px;
            margin: 0 auto;
        }
    </style>
@endpush

@section('content')
    <section class="hashtag-form-section ">
        <div class="form-details">
            <div class="form-title">
                <h5>Add Form</h5>
                <div class="alert alert-dismissible fade show m-0 py-2 mb-1 d-none showMessage" role="alert">
                    <span id="tags-error"></span>
                  </div>
            </div>
            <form action="" class="addForm">
                <div class="form-input-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="nb-3">
                                <label class="fieldlabels">Hashtag :</label>
                                <ul class="tags">
                                    {{-- <li class="addedTag">Web Deisgn<span onclick="$(this).parent().remove();"
                                            class="tagRemove">x</span><input type="hidden" name="tags[]"
                                            value="Web Deisgn"></li>

                                    <li class="addedTag">Web Develop<span onclick="$(this).parent().remove();"
                                            class="tagRemove">x</span><input type="hidden" name="tags[]"
                                            value="Web Develop"></li>

                                    <li class="addedTag">SEO<span onclick="$(this).parent().remove();"
                                            class="tagRemove">x</span><input type="hidden" name="tags[]" value="SEO">
                                    </li> --}}
                                    <li class="tagAdd taglist">
                                        <input type="text" id="search-field" required>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fieldlabels">Title :</label>
                                <input type="text" class="form-control form_title" id="exampleInputtitle"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label fieldlabels">description :</label>
                                <textarea class="form-control form_description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label fieldlabels">Photo :</label>
                                <div class="input-group">
                                    <input type="file" class="form-control form_photo" id="inputGroupFile04"
                                       name="file">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="my-2 d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary submitForm">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $.expr[":"].contains = $.expr.createPseudo(function(arg) {
            return function(elem) {
                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });

        $(document).ready(function() {
            // baseurl
            var baseUrl = $('#base_url').val();

            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#addTagBtn').click(function() {
                $('#tags option:selected').each(function() {
                    $(this).appendTo($('#selectedTags'));
                });
            });
            $('#removeTagBtn').click(function() {
                $('#selectedTags option:selected').each(function(el) {
                    $(this).appendTo($('#tags'));
                });
            });
            $('.tagRemove').click(function(event) {
                event.preventDefault();
                $(this).parent().remove();
            });
            $('ul.tags').click(function() {
                $('#search-field').focus();
            });
            $('#search-field').keypress(function(event) {
                if (event.which == '13') {
                    if (($(this).val() != '') && ($(".tags .addedTag:contains('" + $(this).val() + "') ")
                            .length == 0)) {



                        $('<li class="addedTag">#' + $(this).val() +
                            '<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" value="' +
                            $(this).val() + '" name="tags[]"></li>').insertBefore('.tags .tagAdd');
                        $(this).val('');

                    } else {
                        $(this).val('');

                    }
                }
            });

            // Add Hashtag Detail
            $(document).on('click', '.submitForm', function() {
                var title = $('.form_title').val();
                var description = $('.form_description').val();
                var photo = $('.form_photo')[0].files[0];
                var tag = $("input[name='tags[]']").map(function() {
                    return $(this).val();
                }).get();

                if (tag.length === 0) {
                    $('.showMessage').html("The tags field is required.");
                    $('.showMessage').removeClass('d-none').removeClass('alert-success').addClass('alert-danger');
                    setTimeout (function(){
                        $('.showMessage').addClass('d-none')
                    },5000);
                    return;
                } else {
                    $(`.showMessage`).html(``);
                }

                formdata = new FormData();
                formdata.append('title', title);
                formdata.append('description', description);
                formdata.append('photo', photo);
                formdata.append('tag', tag);


                $.ajax({
                    url: "{{ route('add.hashtag') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(response) {
                        $(".addForm").trigger("reset");
                        $('.showMessage').html("Hashtag Inserted Successfully.");
                        $('.showMessage').removeClass('d-none').removeClass('alert-danger').addClass('alert-success');
                        $(".addedTag").remove();
                        setTimeout (function(){
                            $('.showMessage').addClass('d-none')
                        },5000);
                    },
                    error: function(response) {
                    }
                });
            });
        });
    </script>
@endpush
