@extends('layouts.appLayout')


@section('styles')

<link href="{{asset('/css/contact.css')}}" rel="stylesheet">

@stop


@section('content')


<div class="contactContaier">

    <div class="contact">


        <div class="contactLeft">

            <form action="{{url('/createticket')}}" method="POST" class="contactForm">
                @csrf


                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" name='email' placeholder="email">
                </div>



                <div class="form-group">

                    <label for="message">Description</label>
                    <textarea required type="text" name='message' rows="10" class="form-control">
                    </textarea>
                </div>

                <button class="sendMessage"> Send </button>

                @if(session('successfull'))
                <p class="successfullMessage">{{session('successfull')}}</p>

                @endif

            </form>


        </div>


    </div>


</div>


@stop

@section('scripts')

<script type='text/javascript' defer>
    $('document').ready(function() {
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });
    });
</script>
@stop