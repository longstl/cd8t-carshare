@extends('admin.layout.master')

@section('title')
    User list
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session()->get('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session()->get( 'user' ) }}
                        {{ session()->get( 'status' ) }}
                    </div>
                @endif
                <div class="card-header card-header-primary card-container">
                    <h3 class="card-title ">Users</h3>
                    <form name="filterForm">
                        <div class="form-group no-border">
                            <input type="text" name="search" value="" placeholder="Search by keyword" required/>
                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <a href="{{route('createUser')}}">
                        <button class="btn btn-success">
                            Create new User
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                <h3>User Name</h3>
                            </th>
                            <th>
                                <h3>Full name</h3>
                            </th>
                            <th>
                                <h3>Email</h3>
                            </th>
                            <th>
                                <h3>Phone</h3>
                            </th>

                            <th>
                                <h3>Address</h3>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($list_user as $user)
                                <tr></tr>
                                <div class="modal fade" id="DeleteUser{{ $user->id }}" tabindex="-1"
                                     role="dialog" aria-labelledby="deleteUser"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete
                                                    <b> {{ $user->username }} </b>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <a href="{{route('deleteUser',$user->id)}}"
                                                   class="btn btn-primary">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>{{$user->username}}
                                    </td>
                                    <td>{{$user->first_name.' '.$user->last_name}}
                                    </td>
                                    <td>{{$user->email}}
                                    </td>
                                    <td>{{$user->phone}}
                                    </td>
                                    <td>{{$user->address}}
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteUser{{ $user->id }}">Delete</a>
                                        <a href="{{route('updateUser',$user->id)}}"><button class="btn btn-success">Edit</button></a>
                                    </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagination')
    <div class="row">
        <div class="col-md-9">
            @if(($list_user->currentPage()) > 1)<a class="btn btn-warning" href="user?page=1"><<</a>@else @endif
            @if(($list_user->currentPage()-1)>0)<a class="btn btn-warning" href="user?page={{$list_user->currentPage()-1}}"><</a>@else @endif
            <button class="btn btn-warning">{{$list_user->currentPage()}}</button>
            @if(($list_user->currentPage()+1)<=($list_user->total()))<a class="btn btn-warning" href="user?page={{$list_user->currentPage()+1}}">></a>@else @endif
            @if (($list_user->currentPage()) != $list_user->total())<a class="btn btn-warning" href="user?page={{$list_user->total()}}">>></a>@else @endif
        </div>
        <div class="col-md-3">
            <select class="form-control form-control-sm" id="limit" name="limit">
                <option selected hidden disabled>Show entries</option>
                <option value="1" {{$limit == 1 ? 'selected' : ''}}>25</option>
                <option value="2" {{$limit == 2 ? 'selected' : ''}}>50</option>
                <option value="3" {{$limit == 3 ? 'selected' : ''}}>100</option>
            </select>
        </div>
    </div>
@endsection

@section('extraJs')
    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
        const limitInput = document.querySelector('select[name="limit"]');
        const formSearch = document.forms['filterForm'];
        const keywordInput = document.querySelector('input[name="search"]');
        keywordInput.onkeypress = function (event) {
            if (event.key == 'Enter') {
                formSearch.submit();
            }
        }
        if (limitInput) {
            limitInput.onchange = function () {
                formSearch.submit();
            }
        }
    </script>
@endsection
