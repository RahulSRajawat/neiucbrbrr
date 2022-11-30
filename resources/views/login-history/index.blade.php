@extends("layouts.app")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex header-title justify-content-between">
                            <h5 class="card-title">User Login History</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive resp">
                            <table id="datatable" class="table table-striped table_style" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Sr no</th>
                                        <th>User Name</th>
                                        <th>Login Date</th>
                                        <th>Login Time</th>
                                        <th>User Ip Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count= 1;
                                    @endphp
                                    @foreach($login_histories as $login_history)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$login_history->name}}</td>
                                        <td>{{date_format(date_create($login_history->login_date),"d-m-Y")}}</td>
                                        <td>{{date_format(date_create($login_history->login_date." ".$login_history->login_time),"h:i:s A")}}</td>
                                        <td>{{$login_history->ip_address}}</td>
                                    </tr>
                                    @php
                                    $count++;
                                    @endphp
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
@endsection