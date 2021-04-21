@extends('layouts.dashboardLayout')


@section('content')


<div class="dashboardContentContainer">

    <div class="dashboardHeader">

        <div class="dashboardHeaderDetails">

            <p>Somename</p>
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <button type="submit">Log Out</button>
            </form>

        </div>



    </div>
    @if(session('successfull'))

    <p class="succesfullyProductCreatedMessage">{{session('successfull')}}</p>

    @endif


    <div class="dashboardAddProduct">







        <div class="addProductLeft">

            <form enctype="multipart/form-data" action="{{url('/updateproduct/' . $product->id)}}" method="POST">
                @csrf
                <div class="form-group">

                    <label for="name">Name</label>
                    <input type="text" name='name' value="{{$product->name}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="Title">Title</label>
                    <input type="text" name='title' value="{{$product->title}}" class="form-control">

                </div>


                <div class="form-group">

                    <label for="Description">Description</label>
                    <textarea type="text" wrap="virtual" rows="6" name='description' class="form-control">

                    {{$product->description}}

                    </textarea>
                </div>



                <div class="form-group">

                    <label for="stock">Stock</label>
                    <input type="text" name='stock' value="{{$product->stock}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="Category">Category</label>
                    <input type="text" name='Category' value="{{$product->category}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="type">Type</label>
                    <select name="type" value="{{$product->type}}" class="form-control">

                        <option value="product">Product</option>
                        <option value="newarrival">New Arrival</option>

                    </select>

                </div>

                <div class="form-group">

                    <label for="rating">Rating</label>
                    <input type="text" name='rating' value="{{$product->rating}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="Category">Sale price</label>
                    <input type="text" name='salePrice' value="{{$product->salePrice}}" class="form-control">

                </div>


                <div class="form-group">

                    <label for="price">Price</label>
                    <input type="text" name='price' value="{{$product->price}}" class="form-control">

                </div>

                <div class="form-group">

                    <label class="imageLabel" id='frontImageLabel'>Choose Front Image</label>
                    <input type="file" id='productFrontImage' value="{{$product->frontImage}}" hidden name='frontImage'>

                </div>

                <div class="form-group">

                    <label class="imageLabel" id='mainImageLabel'>Choose Main Image</label>
                    <input type="file" id='productMainImage' value="{{$product->mainImage}}" hidden name='mainImage'>

                </div>



                <div class="subImgaes">



                    <div class="form-group">

                        <label class="subImageLabel" id='subImageLabel1'>Choose Sub Image 1</label>
                        <input type="file" id='productSubImage1' value="{{$product->subImage1}}" hidden name='subImage1'>

                    </div>


                    <div class="form-group">

                        <label class="subImageLabel" id='subImageLabel2'>Choose Sub Image 2</label>
                        <input type="file" id='productSubImage2' value="{{$product->subImage2}}" hidden name='subImage2'>

                    </div>

                    <div class="form-group">

                        <label class="subImageLabel" id='subImageLabel3'>Choose Sub Image 3</label>
                        <input type="file" id='productSubImage3' value="{{$product->subImage3}}" hidden name='subImage3'>

                    </div>

                    <div class="form-group">

                        <label class="subImageLabel" id='subImageLabel4'>Choose Sub Image 4</label>
                        <input type="file" id='productSubImage4' value="{{$product->subImage4}}" hidden name='subImage4'>

                    </div>

                    <div class="form-group">

                        <label class="subImageLabel" id='subImageLabel5'>Choose Sub Image 5</label>
                        <input type="file" id='productSubImage5' value="{{$product->subImage5}}" hidden name='subImage5'>

                    </div>
                </div>


                <button type="submit" class="submitProduct">Update Product</button>
            </form>
        </div>

        <div class="addProductRight">

            <img class="productFrontImage" src="{{asset('images/product.png')}}" alt="">
            <img class="productMainImagePreview" hidden src="{{asset('storage/images/'. $product->mainImage)}}" alt="">


            <div class="subImagesContainer">

                <img class="subImagePreview1" src="{{asset('storage/images/'. $product->subImage1)}}" alt="">
                <img class="subImagePreview2" src="{{asset('storage/images/'. $product->subImage2)}}" alt="">
                <img class="subImagePreview3" src="{{asset('storage/images/'. $product->subImage3)}}" alt="">
                <img class="subImagePreview4" src="{{asset('storage/images/'. $product->subImage4)}}" alt="">
                <img class="subImagePreview5" src="{{asset('storage/images/'. $product->subImage5)}}" alt="">


            </div>

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


    function previewFile(input, imagePreview) {
        var file = $(`#${input}`).get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $(`${imagePreview}`).attr("src", reader.result);
                $(`${imagePreview}`).removeAttr('hidden');
            }

            reader.readAsDataURL(file);
        }
    }

    $('#productFrontImage').change(function() {

        $('#frontImageLabel').html('File Uploaded');

        const input = $('#productFrontImage').attr('id');

        previewFile(input, '.productFrontImage');
    })


    $('#productMainImage').change(function() {

        $('#mainImageLabel').html('File Uploaded');

        const input = $('#productMainImage').attr('id');

        previewFile(input, '.productMainImagePreview');
    })



    //Sub Images

    $('#productSubImage1').change(function() {

        $('#subImageLabel1').html('File Uploaded');

        const input = $('#productSubImage1').attr('id');

        previewFile(input, '.subImagePreview1');
    })

    $('#productSubImage2').change(function() {

        $('#subImageLabel2').html('File Uploaded');

        const input = $('#productSubImage2').attr('id');

        previewFile(input, '.subImagePreview2');
    })


    $('#productSubImage3').change(function() {

        $('#subImageLabel3').html('File Uploaded');

        const input = $('#productSubImage3').attr('id');

        previewFile(input, '.subImagePreview3');
    })


    $('#productSubImage4').change(function() {

        $('#subImageLabel4').html('File Uploaded');

        const input = $('#productSubImage4').attr('id');

        previewFile(input, '.subImagePreview4');
    })


    $('#productSubImage5').change(function() {

        $('#subImageLabel5').html('File Uploaded');

        const input = $('#productSubImage5').attr('id');

        previewFile(input, '.subImagePreview5');
    })



    //Sub Images


    $('#frontImageLabel').click(function() {


        $('#productFrontImage').click();

    })


    $('#mainImageLabel').click(function() {


        $('#productMainImage').click();

    })

    $('#subImageLabel1').click(function() {


        $('#productSubImage1').click();

    })

    $('#subImageLabel2').click(function() {


        $('#productSubImage2').click();

    })

    $('#subImageLabel3').click(function() {


        $('#productSubImage3').click();

    })

    $('#subImageLabel4').click(function() {


        $('#productSubImage4').click();

    })

    $('#subImageLabel5').click(function() {


        $('#productSubImage5').click();

    })
</script>


@stop