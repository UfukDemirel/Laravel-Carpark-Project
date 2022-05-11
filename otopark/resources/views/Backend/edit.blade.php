@extends('Backend.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="right"><a href="{{route('full')}}"><button class="btn btn-light">Back</button></a></div>
                            <h4 class="card-title">Edit</h4>
                            @foreach($edit as $key)
                                <form class="forms-sample" action="{{route('editpost',['id'=>$key->record_id])}}" method="post">
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
                                        <label for="exampleInputUsername1">Plate</label>
                                        <input type="text" class="form-control" placeholder="Plate" name="plate" value="{{$key->plate}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">E-Mail</label>
                                        <input type="text" class="form-control" placeholder="E-Mail" name="email" value="{{$key->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select</label>
                                        <select class="form-control" name="check">
                                            <option @if($key->record_is_active==1) {{'selected'}} @endif value="1" name="check">Aktif</option>
                                            <option @if($key->record_is_active==2) {{'selected'}} @endif value="0" name="check">Pasif</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="users_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    @foreach($edit as $key)
                                        <input type="hidden" name="block_id" value="{{$key->block_id}}">
                                    @endforeach
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
