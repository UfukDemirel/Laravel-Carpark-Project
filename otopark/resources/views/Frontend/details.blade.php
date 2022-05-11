@extends('Frontend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
              <div class="row">
                <div class="col-md-3"></div>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div align="right"><a href="{{route('empty')}}"><button class="btn btn-dark">Exit</button></a></div>
                            <h4 class="card-title">Create Record</h4>
                            <form class="forms-sample" action="{{route('detailspost')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Surname</label>
                                    <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{old('surname')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Plate</label>
                                    <input type="text" class="form-control" placeholder="Plate" name="plate" value="{{old('plate')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">E-Mail</label>
                                    <input type="text" class="form-control" placeholder="E-Mail" name="email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select</label>
                                    <select class="form-control" name="check">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Date Time</label>
                                    <input type="datetime-local" class="form-control" name="date" value="{{old('datetime')}}">
                                </div>
                                <input type="hidden" name="users_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                @foreach($empty as $key)
                                <input type="hidden" name="block_id" value="{{$key->block_id}}">
                                @endforeach
                                <div align="right"><button type="submit" class="btn btn-dark mr-2">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
