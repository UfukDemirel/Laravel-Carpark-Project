@extends('Backend.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="right"><a href="{{route('user')}}"><button class="btn btn-light">Back</button></a></div>
                            <h4 class="card-title">Update</h4>
                            @foreach($user as $key)
                                <form class="forms-sample" action="{{route('usereditpost',['id'=>$key->id])}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$key->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Surname</label>
                                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{$key->surname}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$key->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">E-Mail</label>
                                        <input type="text" class="form-control" placeholder="E-Mail" name="email" value="{{$key->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select</label>
                                        <select class="form-control" name="is_active">
                                            <option @if($key->is_active==1) {{'selected'}} @endif value="1" name="is_active">Aktif</option>
                                            <option @if($key->is_active==0) {{'selected'}} @endif value="0" name="is_active">Pasif</option>
                                        </select>
                                    </div>
                                    <div align="right"><button type="submit" class="btn btn-dark mr-2">Save</button></div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
