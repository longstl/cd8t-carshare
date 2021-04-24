<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <style>
        ::placeholder {
            border: none;
        }
    </style>
</head>
<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a></div>
        <div class="sidebar-wrapper">
            @include('layout.sidebar')
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Table List</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid form-product-container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong> {{ implode('', $errors->all(':message')) }}</strong>
                                </div>
                            @endif
                            <div class="card-header card-header-primary">
                                <h3 class="card-title ">Edit Product</h3>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">
                                <form id="demoFormProducts" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6" style="display: flex;align-items: center">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Product Name</label>
                                                            <input type="text" value="{{$data_product->name}}"
                                                                   name="name" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Price</label>
                                                            <input type="text" value="{{$data_product->price}}"
                                                                   name="price" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Description</label>
                                                            <input type="text" value="{{$data_product->description}}"
                                                                   name="description" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select name="category_id"
                                                                    class="selectpicker select-category">
                                                                <option hidden selected disabled>category</option>
                                                                @foreach($list_category as $category)
                                                                    <option hidden selected disabled>Category</option>
                                                                    <option
                                                                        value="{{$category->id}}" {{$data_product->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="images">
                                        <input type="file" id="file_img" name="list_photo" style="display: none">
                                        <div class="container-addoption">
                                            <div class="btn_add_img">
                                                <h1>+</h1>
                                            </div>
                                        </div>
                                        <div id="image-view" class="img_show ">
                                            <div id="image_view_2" style="margin-left: 30px" class="row">
                                                @php
                                                    $images = explode(',',$data_product->images)
                                                @endphp
                                                @for($i = 0 ; $i < sizeof($images)-1 ; $i++)
                                                    <div class="row">
                                                        <img id="img_{{$i}}"
                                                             style="margin:0 5px 5px 5px;border-radius: 3px;border: #0a6ebd 2px solid"
                                                             height="100px" width="100px" src="{{$images[$i]}}">
                                                        <p style="margin-right: 30px"><span id="close_img_{{$i}}"
                                                                                            onclick="document.querySelector('#img_{{$i}}').remove();document.querySelector('#close_img_{{$i}}').remove()"
                                                                                            style="font-size: 20px;color: red;margin-right: 20px;cursor: pointer">&times;</span>
                                                        </p></div>
                                                @endfor


                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none">
                                        <button type="submit" id="btn_product"
                                                class="btn btn-primary pull-right d-block">Create product
                                        </button>
                                    </div>
                                    <div id="form_product">
                                    </div>
                                    <button id="btn_submit" class="btn btn-primary">Submit</button>
                                    <p data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i
                                            class="fa fa-pencil" aria-hidden="true"></i> Options</p>
                                    <a href="" class="btn btn-warning">Back</a>
                                </form>
                                <div class="container">


                                    <!-- Button to Open the Modal -->


                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="width: 700px !important;">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Heading</h4>
                                                    <button type="button" style="color: red" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div id="form_edit_otion"
                                                     style="height: 0;overflow: hidden;width: 0;transition: 0.5s;position: relative">
                                                    <form id="form_update_option" method="POST" style="margin: 40px auto !important; text-align: center">
                                                        @csrf
                                                        <input type="text" name="product_id" value="{{$data_product->id}}">
                                                        <label style="margin-right: 20px; font-size: 18px">Size</label>
                                                        <select style="background: none;margin-bottom: 5px;border-bottom: 1px solid black !important;width: 200px" name="size_id">
                                                            @foreach($listSize as $size)
                                                                <option hidden disabled selected>Selected</option>
                                                                <option value="{{$size->id}}">{{$size->name}}</option>
                                                            @endforeach
                                                        </select><br><br>
                                                        <label style="margin-right: 20px; font-size: 18px">Color</label>
                                                        <select style="background: none;margin-bottom: 5px;border-bottom: 1px solid black !important;width: 200px" name="color_id">
                                                            @foreach($listColor as $color)
                                                                <option hidden disabled selected>Selected</option>
                                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                                            @endforeach
                                                        </select><br><br>
                                                        <label
                                                            style="margin-right: 20px; font-size: 18px">Quantity</label>
                                                        <input name="quantity" id="edit_quantity" type="text" style="background: none;border:none;">
                                                        <div style="position: absolute ; right: 10px;bottom: 10px">
                                                            <button type="submit" class="btn btn-warning">Update
                                                            </button>
                                                            <p class="btn btn-success"
                                                               onclick=" $( '#all_option').css('height','auto'); document.querySelector('#form_edit_otion').style.height = '0';document.querySelector('#form_edit_otion').style.width = '0'">
                                                                Cancel</p>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-body" id="all_option"
                                                     style="overflow: hidden;transition: 0.6s">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <th><h4 style="text-align: center">Color</h4></th>
                                                        <th><h4 style="text-align: center">Size</h4></th>
                                                        <th><h4 style="text-align: center">Quantity</h4></th>
                                                        <th><h4 style="text-align: center">Action</h4></th>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($option as $i=>$opt)
                                                                <tr>
                                                                    <td >{{$opt->color->name}}</td>
                                                                    <td >{{$opt->size->name}}</td>
                                                                    <td ><h4 id="quantityy{{$i}}" slot="{{$opt->quantity}}">{{$opt->quantity}}</h4></td>
                                                                    <td>
                                                                        <p onclick="$('#all_option').css('height','0'); document.querySelector('#form_edit_otion').style.height = '300px';document.querySelector('#form_edit_otion').style.width = '100%';document.querySelector('#edit_quantity').value = document.getElementById('quantityy{{$i}}').slot;document.querySelector('#form_update_option').action = '/productOption/update/{{$opt->id}}'"
                                                                           class="btn btn-warning">Edit</p>
                                                                        <button
                                                                            onclick="document.querySelector('#container_option{{$i}}').remove()"
                                                                            class="btn btn-danger">Remove
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right" id="date">
                    , made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
        <script>
            const x = new Date().getFullYear();
            let date = document.getElementById('date');
            date.innerHTML = '&copy; ' + x + date.innerHTML;
        </script>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        @include('layout.edit_style')
    </div>
</div>
<input type="hidden" value="product" id="page_active">
<!--   Core JS Files   -->
@include('layout.script')


<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#demoFormProducts').validate({
            rules: {
                name: {
                    required: true
                },
                price: {
                    required: true,
                    number: true
                },
                description: {
                    required: true,
                }
            },
            messages: {
                product_name: {
                    required: 'Product field is required'
                },
                Price: {
                    required: 'Price field is required',
                    number: 'please enter the number'
                },
                Description: {
                    required: "Description field is required",
                },
            }
        });
    })
</script>


<script src="{{lib_assets('script/product.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('#submit1').click(function () {
        })
        $('#submit').click(function () {
            $('#submit1').click()
        })
    })
    var imageURL2 = document.querySelector('input[name="images"]')
    const cloudName1 = 'ddmgbaegq';
    const unsignedUploadPreset1 = 'hrn13yyl';
    var img2 = document.querySelector('input[name=list_photo]');
    img2.onchange = function () {
        var file = this.files[0];
        var url = `https://api.cloudinary.com/v1_1/${cloudName1}/upload`
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    var dataJson = JSON.parse(this.responseText)
                    imageURL2.value += `${dataJson.url + ','}`
                    var img_review = document.getElementById('image_view_2');
                    console.log(imageURL2.value)
                    img_review.innerHTML += `<img style="margin:0 5px 5px 5px;border-radius: 3px;border: #0a6ebd 2px solid" height="100px" width="100px" src="${dataJson.url}">`
                }
            }
        }
        xhr.open('POST', url, true);
        var ud = new FormData();
        ud.append('upload_preset', unsignedUploadPreset1);
        ud.append('tags', 'browser_upload')
        ud.append('file', file)
        xhr.send(ud)
    }
    document.addEventListener("DOMContentLoaded", function () {
        let btn_add_img = document.querySelector('.btn_add_img')
        let formimgfile = document.querySelector('#file_img')
        btn_add_img.onclick = function () {
            formimgfile.click()
        };
        let btn_submit = document.querySelector('#btn_submit')
        btn_submit.onclick = function () {
            let images = document.querySelector('input[name=images]')
            images.value = ''
            let img = document.querySelectorAll('#image-view  img')
            for (let i = 0; i < img.length; i++) {
                console.log(img[i].src + i)
                images.value += img[i].src + ','
            }
        }
    })
</script>
</body>
</html>
