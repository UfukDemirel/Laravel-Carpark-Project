@extends('Backend.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="right"><a href="{{route('empty')}}"><button class="btn btn-dark">Back</button></a></div>
                            <h4 class="card-title">Edit</h4>
                                <form class="forms-sample" action="{{route('profilpost')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Surname</label>
                                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{Auth::user()->surname}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{Auth::user()->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">E-Mail</label>
                                        <input type="text" class="form-control" placeholder="E-Mail" name="email" value="{{Auth::user()->email}}">
                                    </div>
                                    <div align="right"><button type="submit" class="btn btn-dark">Save</button></div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


