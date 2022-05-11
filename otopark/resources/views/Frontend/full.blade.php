@extends('Frontend.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">A Block</h4>
                            @foreach($data as $key)
                                <br>
                                <div class="template-demo">
                                    <a href="{{route('settings',['id'=>$key->block_id])}}"><button type="submit" class="btn btn-primary btn-lg btn-block">{{$key->blok_code}}</button></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">B Block</h4>
                            @foreach($datab as $key)
                                <br>
                                <div class="template-demo">
                                    <a href="{{route('settings',['id'=>$key->block_id])}}"><button type="submit" class="btn btn-primary btn-lg btn-block">{{$key->blok_code}}</button></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">C Block</h4>
                            @foreach($datac as $key)
                                <br>
                                <div class="template-demo">
                                    <a href="{{route('settings',['id'=>$key->block_id])}}"><button type="submit" class="btn btn-primary btn-lg btn-block">{{$key->blok_code}}</button></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

