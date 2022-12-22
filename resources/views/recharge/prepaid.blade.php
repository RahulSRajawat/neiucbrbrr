@extends('layouts.app')
@section('title', 'Recharge Prepaid')
@section('styles')
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            background-color: #f8f8f8;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            color: #999;
            font-size: 14px;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            border-bottom: 2px solid #1e6ad8;
            color: black;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
        }
    </style>
@endsection
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h5 class="card-title">Prepaid Mobile Recharge</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alerts"></div>
                            <form class="recharge_form" id="add" method="post"
                                action="{{ route('recharge.prepaid-store') }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="email">Prepaid Mobile Number:</label>
                                    <input type="number"  class="form-control" id="mnumber" name="phone">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="pwd">Operator:</label>
                                    <select class="form-select mb-3 shadow-none" name="operator" >
                                        <option selected="" value="">Select Your Operator</option>
                                        @foreach ($operators as $operator)
                                            @if ($operator->category == 'Prepaid')
                                                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="form-label" for="pwd">Circle:</label>
                                    <select class="form-select mb-3 shadow-none">
                                        <option selected="">Select Your Circle</option>
                                        <option value="1">Mp</option>
                                        <option value="2">Up</option>
                                        <option value="3">Bihar</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label class="form-label" for="pwd">Recharge Amount:</label>
                                    <input type="number"  class="form-control" id="pwd" name="amount">
                                </div>
                                <button type="submit"
                                    class="btn btn-outline-primary rounded-pill btn-sbmit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h5 class="card-title">Browse Plans of BSNL - Madhya Pradesh Chhattisgarh</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab">
                                <button class="tablinks active" onclick="lists(event, 'popular')">Popular</button>
                                <button class="tablinks" onclick="lists(event, 'special_recharge')">Special
                                    Recharge</button>
                                <button class="tablinks" onclick="lists(event, 'top_up')">Top Up</button>
                                <button class="tablinks" onclick="lists(event, 'data_structure')">2G/3G/4G Data</button>
                                <button class="tablinks" onclick="lists(event, 'full_talktime')">Full Talktime</button>
                            </div>
                            <!-- Tab content -->
                            <div id="popular " class="tabcontent" style="display: block;">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <tr>
                                            <td class="re_td_head">Circle</td>
                                            <td class="re_td_head">Plan type</td>
                                            <td class="re_td_head">Data</td>
                                            <td class="re_td_head">Validity</td>
                                            <td class="re_td_head">Price</td>
                                            <td class="re_td_head">Description</td>
                                        </tr>
                                        <tr>
                                            <td class="re_td_data">Madhya</td>
                                            <td class="re_td_data">Topup</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">
                                                <button class="btn btn-outline-info rounded-pill"
                                                    style="padding: 3px 13px;">Rs. 10</button>
                                            </td>
                                            <td class="re_td_data">Unlimited voice calls+U</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div id="special_recharge" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <tr>
                                            <td class="re_td_head">Circle</td>
                                            <td class="re_td_head">Plan type</td>
                                            <td class="re_td_head">Data</td>
                                            <td class="re_td_head">Validity</td>
                                            <td class="re_td_head">Price</td>
                                            <td class="re_td_head">Description</td>
                                        </tr>
                                        <tr>
                                            <td class="re_td_data">Madhya</td>
                                            <td class="re_td_data">Topup</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">
                                                <button class="btn btn-outline-info" style="padding: 3px 13px;">Rs.
                                                    23</button>
                                            </td>
                                            <td class="re_td_data">Unlimited voice calls+U</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div id="top_up" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <tr>
                                            <td class="re_td_head">Circle</td>
                                            <td class="re_td_head">Plan type</td>
                                            <td class="re_td_head">Data</td>
                                            <td class="re_td_head">Validity</td>
                                            <td class="re_td_head">Price</td>
                                            <td class="re_td_head">Description</td>
                                        </tr>
                                        <tr>
                                            <td class="re_td_data">Madhya</td>
                                            <td class="re_td_data">Topup</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">
                                                <button class="btn btn-outline-info" style="padding: 3px 13px;">Rs.
                                                    65</button>
                                            </td>
                                            <td class="re_td_data">Unlimited voice calls+U</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div id="data_structure" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <tr>
                                            <td class="re_td_head">Circle</td>
                                            <td class="re_td_head">Plan type</td>
                                            <td class="re_td_head">Data</td>
                                            <td class="re_td_head">Validity</td>
                                            <td class="re_td_head">Price</td>
                                            <td class="re_td_head">Description</td>
                                        </tr>
                                        <tr>
                                            <td class="re_td_data">Madhya</td>
                                            <td class="re_td_data">Topup</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">
                                                <button class="btn btn-outline-info" style="padding: 3px 13px;">Rs.
                                                    69</button>
                                            </td>
                                            <td class="re_td_data">Unlimited voice calls+U</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div id="full_talktime" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <tr>
                                            <td class="re_td_head">Circle</td>
                                            <td class="re_td_head">Plan type</td>
                                            <td class="re_td_head">Data</td>
                                            <td class="re_td_head">Validity</td>
                                            <td class="re_td_head">Price</td>
                                            <td class="re_td_head">Description</td>
                                        </tr>
                                        <tr>
                                            <td class="re_td_data">Madhya</td>
                                            <td class="re_td_data">Topup</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">NA</td>
                                            <td class="re_td_data">
                                                <button class="btn btn-outline-info" style="padding: 3px 13px;">Rs.
                                                    95</button>
                                            </td>
                                            <td class="re_td_data">Unlimited voice calls+U</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function lists(evt, listdata) {
            // Declare all variables
            var i, tabcontent, tablinks;
            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(listdata).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
