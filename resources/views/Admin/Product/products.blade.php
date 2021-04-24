<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
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
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Products List</a>
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if(session()->get('status'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> {{ session()->get( 'product' ) }}
                                    {{ session()->get( 'status' ) }}
                                </div>
                            @endif
                            <div class="card-header card-header-primary card-container">
                                <h3 class="card-title ">Products</h3>
                                <form name="filterForm">
                                    <div class="row">
                                        <div class="form-group no-border" style="margin-right: 30px">
                                            <input type="text" value="{{$search}}" name="search" placeholder="Search by name">
                                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                                <i class="material-icons">search</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                        <div class="form-group no-border">
                                            <select name="category_id" class="selectpicker select-category" style="background: none">
                                                @foreach($listCategory as $category)
                                                    <option hidden selected disabled>category</option>

                                                    <option value="{{$category->id }}" {{$category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                </form>
                                <a href="/product/create" class="btn btn-warning">New product</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            <h3>ID</h3>
                                        </th>
                                        <th>
                                            <h3>Name</h3>
                                        </th>
                                        <th>
                                            <h3>Price</h3>
                                        </th>
                                        <th>
                                            <h3>Descriptions</h3>
                                        </th>
                                        {{--                                        <th>--}}
                                        {{--                                            <h3>Category</h3>--}}
                                        {{--                                        </th>--}}

                                        <th>
                                            <h3>Thumbnail</h3>
                                        </th>

                                        <th>
                                            <h3>Edit</h3>
                                        </th>

                                        </thead>
                                        <tbody>
                                        @foreach($listProducts as $product)
                                            <div class="modal fade" id="DeleteProduct{{ $product->id }}" tabindex="-1"
                                                 role="dialog" aria-labelledby="deleteUser"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete
                                                                <b> {{ $product->name }} </b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <a href="product/delete/{{ $product->id }}"
                                                               class="btn btn-primary">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <td>
                                                <h4>{{$product->id}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$product->name}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$product->price}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$product->description}}</h4>
                                            </td>
                                            <td>
                                                @php
                                                $images = explode(',',$product->images)
                                                @endphp
                                                <img class="rounded img_products" src="{{$images[0]}}">
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteProduct{{ $product->id }}">Delete</a>
                                                <a href="/product/update/{{ $product->id }}"><button class="btn btn-success">Edit</button></a>
                                                </a>
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
                <div class="col-md-9">
                    @if(($listProducts->currentPage()) > 1)<a class="btn btn-warning" href="product?page=1"><<</a>@else @endif
                    @if(($listProducts->currentPage()-1)>0)<a class="btn btn-warning" href="product?page={{$listProducts->currentPage()-1}}"><</a>@else @endif
                    <button class="btn btn-warning">{{$listProducts->currentPage()}}</button>
                    @if(($listProducts->currentPage()+1)<=($listProducts->total()))<a class="btn btn-warning" href="product?page={{$listProducts->currentPage()+1}}">></a>@else @endif
                    @if (($listProducts->currentPage()) != $listProducts->total())<a class="btn btn-warning" href="product?page={{$listProducts->total()}}">>></a>@else @endif
                </div>
            </div>
        </footer>
        <script>
            const limitInput = document.querySelector('select[name="limit"]');
            const formSearch = document.forms['filterForm'];
            const keywordInput = document.querySelector('input[name="search"]');
            const Category = document.querySelector('select[name="category_id"]');
            keywordInput.onkeypress = function (event) {
                if (event.key == 'Enter') {
                    formSearch.submit();
                }
            }
            if (limitInput) {
                limitInput.onchange = function () {
                    formSearch.submit();
                }
            } if (Category) {
                Category.onchange = function () {
                    formSearch.submit();
                }
            }
        </script>
    </div>
</div>


<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        @include('layout.edit_style')
    </div>
</div>
<input type="hidden" value="product" id="page_active">
@include('layout.script')
</body>
</html>
