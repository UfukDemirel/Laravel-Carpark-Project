@extends('Backend.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Parking Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            İmage
                                        </th>
                                        <th>
                                            İD
                                        </th>
                                        <th>
                                            Name Surname
                                        </th>
                                        <th>
                                            E-Mail
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Active
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($table as $key)
                                    <tbody>
                                    <tr>
                                        <td class="py-1">
                                            <img src="/public/images/{{$key->file}}" alt="image"/>
                                        </td>
                                        <td>
                                            {{$key->record_id}}
                                        </td>
                                        <td>
                                            {{$key->name}} {{$key->surname}}
                                        </td>
                                        <td>
                                          {{$key->email}}
                                        </td>
                                        <td>
                                            {{$key->phone}}
                                        </td>
                                        <td>
                                            {{$key->date}}
                                        </td>
                                        <td>
                                            @if($key->check == '0')
                                                <label class="badge badge-warning">Pasif</label>
                                            @endif
                                            @if($key->check == '1')
                                                <label class="badge badge-success">Aktif</label>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Dropdown</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                                    <a class="dropdown-item" href="{{route('edit',['id'=>$key->record_id])}}">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

