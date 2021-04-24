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
                                <h3 class="card-title ">New Product</h3>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">
                                <form id="demoFormProducts" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Product Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Price</label>
                                                <input type="text" name="price" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Description</label>
                                                <input type="text" name="description" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" name="options" value="">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="category_id" class="selectpicker select-category">
                                                    @foreach($listCategory as $category)
                                                        <option hidden selected disabled>category</option>
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="images">
                                        <input type="file" id="file_img" name="list_photo" style="display: none">
                                        <div class="container-addoption">
                                            <div class="btn_add_img">
                                                <h1>+</h1>
                                            </div>
                                        </div>
                                        <div id="image-view" class="img_show">
                                        </div>
                                    </div>
                                    <div style="display: none">
                                        <button type="submit" id="btn_product"
                                                class="btn btn-primary pull-right d-block">Create product
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form_items" id="form_create">
                                        <hr>
                                        <div style="margin-bottom: 20px">option</div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <span>Size</span>
                                                    <select class="size" name="size_id[]">
                                                        @foreach($listSize as $size)
                                                            <option hidden disabled selected>Selected</option>
                                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <hr style="background: #0b75c9;height: 1px;width: 200px;margin: 0">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span>Color</span>
                                                    <select class="color" name="color_id[]">
                                                        @foreach($listColor as $color)
                                                            <option hidden disabled selected>Selected</option>
                                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <hr style="background: #0b75c9;height: 1px;width: 200px;margin: 0">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <span>Quantity</span>
                                                    <input type="text" value="1" name="quantity[]" class="form-control quantity"
                                                           style="transform: translateY(-10px)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form_product">
                                    </div>
                                </form>
                                <div id="btn_add_option">
                                    +
                                </div>
                                <button id="btn_submit" class="btn btn-primary">Submit</button>
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
                },
                quantity: {
                    required: true,
                    number: true
                }
            },
            messages: {
                name: {
                    required: 'Product field is required'
                },
                price: {
                    required: 'Price field is required',
                    number: 'please enter the number'
                },
                description: {
                    required: "Description field is required",
                },
                quantity: {
                    required: 'quantity field is required',
                    number: 'please enter the number'
                }
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
                    var img_review = document.getElementById('image-view');
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
//
        let btn_add_img = document.querySelector('.btn_add_img')
        let formimgfile = document.querySelector('#file_img')
        btn_add_img.onclick = function () {
            formimgfile.click()
        };
//
        let btn_addtable = document.getElementById('btn_add_option')
        let all_table = document.querySelector('#form_product')
        let btn_submit = document.querySelector('#btn_submit')
        let btn_product = document.querySelector('#btn_product')
        let obj_option = document.querySelector('#obj_option')


        let y = 1
        btn_addtable.onclick = function () {

            let size = document.querySelectorAll('.size')
            let color = document.querySelectorAll('.color')
            let Quantity = document.querySelectorAll('.quantity')
            let number = document.querySelectorAll('.form_items').length
            let options = []
            for (let i = 0; i < number; i++) {
                const object = {
                    'product_id': "",
                    'size': size[i].value,
                    'color': color[i].value,
                    'quantity': Quantity[i].value,
                }
                options[i] = object
            }
            all_table.innerHTML = '';
            for (let i = 1; i < options.length; i++) {
                all_table.innerHTML += `<div id="form_item${y}" class="form_items">
                                <hr style="color: red !important;height: 5px;width: 80%;z-index: 1000000">
                                <h3 class="btn_sub" onclick="document.getElementById('form_item${y}').remove()"  style="float: right;width: 30px;height: 30px;border: #0b75c9 1px solid;text-align: center;font-size: 18px;cursor: pointer;border-radius: 4px">-</h3>
                                <div style="margin-bottom: 20px">option</div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span>Size</span>
                                            <select class="size" name="size_id[]">
                                                        @foreach($listSize as $size)
                <option hidden disabled selected>Selected</option>
                <option value="{{$size->id}}">{{$size->name}}</option>
                                                        @endforeach
                </select>
        <hr style="background: #0b75c9;height: 1px;width: 200px;margin: 0">
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <span>Color</span>
        <select class="color" name="color_id[]">
                                                        @foreach($listColor as $color)
                <option hidden disabled selected>Selected</option>
                <option value="{{$color->id}}">{{$color->name}}</option>
                                                        @endforeach
                </select>
<hr style="background: #0b75c9;height: 1px;width: 200px;margin: 0">
                            </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Quantity</span>
                                            <input name="quantity[]" type="text" value="${options[i].quantity}" class="form-control quantity" style="transform: translateY(-10px)">
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            }
            all_table.innerHTML += `<div id="form_item${y}" class="form_items">
                                <hr style="color: red !important;height: 5px;width: 80%;z-index: 1000000">
                                <h3 onclick="document.getElementById('form_item${y}').remove()"  style="float: right;width: 30px;height: 30px;border: #0b75c9 1px solid;text-align: center;font-size: 18px;cursor: pointer;border-radius: 4px">-</h3>
                                <div style="margin-bottom: 20px">option</div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <span>Size</span>
                                            <select class="size" name="size_id[]">
                                                @foreach($listSize as $size)
                                                <option hidden disabled selected>Selected</option>
                                                <option value="{{$size->id}}">{{$size->name}}</option>
                                                @endforeach
                                            </select>
                                        <hr style="background: #0b75c9;height: 1px;width: 200px;margin: 0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Color</span>
                                        <select class="color" name="color_id[]">
                                                        @foreach($listColor as $color)
                                                                <option hidden disabled selected>Selected</option>
                                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                                        @endforeach
            </select>
    <hr style="background: #0b75c9;height: 1px;width: 200px;margin: 0">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
    <span>Quantity</span>
    <input type="text" name="quantity[]" value="1" class="form-control quantity" style="transform: translateY(-10px)">
</div>
</div>
</div>
</div>`
            y++
        }
        btn_submit.onclick = function () {
            let size = document.querySelectorAll('.size')
            let color = document.querySelectorAll('.color')
            let Quantity = document.querySelectorAll('.quantity')
            let number = document.querySelectorAll('.form_items').length
            let options = [];
            for (let i = 0; i < number; i++) {
                options[i] = {
                    'size': size[i].value,
                    'color': color[i].value,
                    'quantity': Quantity[i].value,
                }
            }

            // var obj = JSON.parse(obj_option.value)
            // console.log(obj.length)
            btn_product.click()
        }
    })
</script>


</body>
</html>
