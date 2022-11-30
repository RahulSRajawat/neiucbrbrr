@extends("layouts.app")
@section("title","Pending Users")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex header-title justify-content-between">
                            <h5 class="card-title">Pending Users</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive resp">
                            <table id="datatable" class="table table-striped table_style" data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Sr no</th>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Mobile</th>
                                        <th>Firm Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count= 1;
                                    @endphp
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td>{{$user->firm_name}}</td>
                                        <td><span class="badge bg-{{($user->status == 1 )?'success':'danger'}}">{{($user->status == 1 )?"Active":"Inactive"}}</span></td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-warning" onclick="$('#my-modal-{{$count}}').modal('show')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="my-modal-{{$count}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="my-modal-title">User Update</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('admin/pending_user')}}" method="post">
                                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="role">Role</label>
                                                                <select name="role" id="role" required class="form-control">
                                                                    <option value="">-- Select Role --</option>
                                                                    @foreach($roles as $role)
                                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="status">Status</label>
                                                                <select name="status" id="status" required class="form-control">
                                                                    <option value="">-- Select Status --</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="0">InActive</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <button class="btn btn-primary" type="submit">{{__("Update")}}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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