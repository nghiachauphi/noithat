@extends('layouts.app')
@section('content')
<div>
    <div class="card-header h1 text-center " style="width: 100%"><a class="bg bg-dark">Xóa tài khoản</a></div>
    <table class="table table-striped table-hover style">
        <div class="card-body all-center " style="width: 100%;">
            <form class="form-group" action="{{ url('/info/delete-info/' . $user->id) }}" method="post">
                @csrf
                <div class="form-group all-center">
                    <div class="form-group" style="margin-right: 2%">
                        <p >Bạn có muốn xóa tài khoản {{$user->name}} không?</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"><i class="fal fa-save"></i> Xác nhận xóa</button>
                    </div>

                </div>

            </form>
        </div>
    </table>
</div>
    <style>
        .style{
            border: thin solid red;
        }
    </style>
@endsection