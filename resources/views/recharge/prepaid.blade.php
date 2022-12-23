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
                                    <input type="number" class="form-control" id="mnumber" name="phone">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="pwd">Operator:</label>
                                    <select class="form-select mb-3 shadow-none" name="operator">
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
                                    <input type="number" class="form-control" id="amount" name="amount">
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
                            <div id="popular" class="tabcontent" style="display: block;">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td class="re_td_head">Circle</td>
                                                <td class="re_td_head">Plan type</td>
                                                <td class="re_td_head">Data</td>
                                                <td class="re_td_head">Validity</td>
                                                <td class="re_td_head">Price</td>
                                                <td class="re_td_head">Description</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="special_recharge" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td class="re_td_head">Circle</td>
                                                <td class="re_td_head">Plan type</td>
                                                <td class="re_td_head">Data</td>
                                                <td class="re_td_head">Validity</td>
                                                <td class="re_td_head">Price</td>
                                                <td class="re_td_head">Description</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="top_up" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td class="re_td_head">Circle</td>
                                                <td class="re_td_head">Plan type</td>
                                                <td class="re_td_head">Data</td>
                                                <td class="re_td_head">Validity</td>
                                                <td class="re_td_head">Price</td>
                                                <td class="re_td_head">Description</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="data_structure" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td class="re_td_head">Circle</td>
                                                <td class="re_td_head">Plan type</td>
                                                <td class="re_td_head">Data</td>
                                                <td class="re_td_head">Validity</td>
                                                <td class="re_td_head">Price</td>
                                                <td class="re_td_head">Description</td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="full_talktime" class="tabcontent">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td class="re_td_head">Circle</td>
                                                <td class="re_td_head">Plan type</td>
                                                <td class="re_td_head">Data</td>
                                                <td class="re_td_head">Validity</td>
                                                <td class="re_td_head">Price</td>
                                                <td class="re_td_head">Description</td>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
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
        $("select[name='operator']").on("change", function() {
            $.ajax({
                url: "{{ route('recharge-plan.plan-list') }}",
                type: "POST",
                data: {
                    id: $(this).val()
                },
                dataType: "JSON",
                success: function(result) {
                    var data = result.data;
                    var popular = data.populars;
                    var special_recharge = data.special_recharge;
                    var top_up = data.top_up;
                    var data_structure = data.internet_data;
                    var full_talktime = data.full_talktime;
                    if (popular.length > 0) {
                        var popular_html = "";
                        for (let index = 0; index < popular.length; index++) {
                            const popular_element = popular[index];
                            console.log(popular_element.circle);
                            popular_html += '<tr>';
                            popular_html += '<td>' + popular_element.circle + '</td>';
                            popular_html += '<td>' + popular_element.plan_category_name + '</td>';
                            popular_html += '<td>' + popular_element.data + '</td>';
                            popular_html += '<td>' + popular_element.validity + '</td>';
                            popular_html +=
                                '<td><button class="btn btn-outline-info rounded-pill" style="padding: 3px 13px;" onclick="changeamount(' +
                                popular_element.price + ')">₹ ' + popular_element.price +
                                '</button></td>';
                            popular_html += '<td>' + popular_element.description + '</td>';
                            popular_html += '</tr>';
                        }
                        $("#popular table tbody").html(popular_html);
                    }
                    if (special_recharge.length > 0) {
                        var special_recharge_html = "";
                        for (let index = 0; index < special_recharge.length; index++) {
                            const special_recharge_element = special_recharge[index];
                            special_recharge_html += '<tr>';
                            special_recharge_html += '<td>' + special_recharge_element.circle + '</td>';
                            special_recharge_html += '<td>' + special_recharge_element.plan_category_name + '</td>';
                            special_recharge_html += '<td>' + special_recharge_element.data + '</td>';
                            special_recharge_html += '<td>' + special_recharge_element.validity + '</td>';
                            special_recharge_html +=
                                '<td><button class="btn btn-outline-info rounded-pill" style="padding: 3px 13px;" onclick="changeamount(' +
                                special_recharge_element.price + ')">₹ ' + special_recharge_element.price +
                                '</button></td>';
                            special_recharge_html += '<td>' + special_recharge_element.description + '</td>';
                            special_recharge_html += '</tr>'; 
                        }
                        $("#special_recharge table tbody").html(special_recharge_html);
                    }
                    if (top_up.length > 0) {
                        var top_up_html = "";
                        for (let index = 0; index < top_up.length; index++) {
                            const top_up_element = top_up[index];
                            top_up_html += '<tr>';
                            top_up_html += '<td>' + top_up_element.circle + '</td>';
                            top_up_html += '<td>' + top_up_element.plan_category_name + '</td>';
                            top_up_html += '<td>' + top_up_element.data + '</td>';
                            top_up_html += '<td>' + top_up_element.validity + '</td>';
                            top_up_html +=
                                '<td><button class="btn btn-outline-info rounded-pill" style="padding: 3px 13px;" onclick="changeamount(' +
                                top_up_element.price + ')">₹ ' + top_up_element.price +
                                '</button></td>';
                            top_up_html += '<td>' + top_up_element.description + '</td>';
                            top_up_html += '</tr>'; 
                        }
                        $("#top_up table tbody").html(top_up_html);
                    }
                    if (data_structure.length > 0) {
                        var data_structure_html = "";
                        for (let index = 0; index < data_structure.length; index++) {
                            const data_structure_element = data_structure[index];
                            data_structure_html += '<tr>';
                            data_structure_html += '<td>' + data_structure_element.circle + '</td>';
                            data_structure_html += '<td>' + data_structure_element.plan_category_name + '</td>';
                            data_structure_html += '<td>' + data_structure_element.data + '</td>';
                            data_structure_html += '<td>' + data_structure_element.validity + '</td>';
                            data_structure_html +=
                                '<td><button class="btn btn-outline-info rounded-pill" style="padding: 3px 13px;" onclick="changeamount(' +
                                data_structure_element.price + ')">₹ ' + data_structure_element.price +
                                '</button></td>';
                            data_structure_html += '<td>' + data_structure_element.description + '</td>';
                            data_structure_html += '</tr>'; 
                        }
                        $("#data_structure table tbody").html(data_structure_html);
                    }
                    if (full_talktime.length > 0) {
                        var full_talktime_html = "";
                        for (let index = 0; index < full_talktime.length; index++) {
                            const full_talktime_element = full_talktime[index];
                            full_talktime_html += '<tr>';
                            full_talktime_html += '<td>' + full_talktime_element.circle + '</td>';
                            full_talktime_html += '<td>' + full_talktime_element.plan_category_name + '</td>';
                            full_talktime_html += '<td>' + full_talktime_element.data + '</td>';
                            full_talktime_html += '<td>' + full_talktime_element.validity + '</td>';
                            full_talktime_html +=
                                '<td><button class="btn btn-outline-info rounded-pill" style="padding: 3px 13px;" onclick="changeamount(' +
                                full_talktime_element.price + ')">₹ ' + full_talktime_element.price +
                                '</button></td>';
                            full_talktime_html += '<td>' + full_talktime_element.description + '</td>';
                            full_talktime_html += '</tr>'; 
                        }
                        $("#full_talktime table tbody").html(full_talktime_html);
                    }
                }
            })
        });

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
        function changeamount(amount){
            $("#amount").val(amount);
        }
    </script>
@endsection
