@extends('layout')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="form-group">
                <input class="form-control" name="search" id="search" placeholder="Search Here..">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="button" value="Delete Selected" id="deleteChecked" class="btn btn-danger pull-right">
                {{csrf_field()}}
            </div>
        </div>
        <div class="row">
            <div class="table-responsive panel panel-default">
                <table class="table">

                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkbox" id="checkAll"></th>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>View / Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pages">
            <ul id="pagination" class="pagination-md"></ul>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>

    <script src="/js/searchFaculty.js" type="text/javascript" charset="utf-8" async defer></script>
@stop

@section('styles')
    <style type="text/css" media="screen">
        thead tr th, tbody tr td, .pages{
            text-align: center;
        } 
        .left-align {
            text-align: left;
        }
        .centerDrop {
            text-align: center;
            width: 108px;
            min-width: 108px;
        }
        #deleteChecked, #items {
            max-width: 160px;
            margin-bottom: 16px;
        }
        .btns {
            display: inline-block;
            color: white;
        }
    </style>
@stop