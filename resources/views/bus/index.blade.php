@extends('layouts.app')
@section('title', 'Bus')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title w-100">
                                <h4 class="card-title">OnLine Bus Booking</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="bussw ">
                                <div class="bussw_inner row">
                                    <div class="bussw_inputBox selectHtlCity  ">
                                        <label for="fromCity" class="lbl_input makeFlex column latoBold"><span
                                                data-cy="fromCity" class="appendBottom5">From</span>
                                            <select id="fromCity" data-cy="fromCityVal"
                                                class="bussw_inputField font30 latoBlack">
                                                <option>Delhi, Delhi</option>
                                                <option>Mumbai</option>
                                                <option>Banglore</option>
                                                <option>Pune</option>
                                            </select>
                                            <p data-cy="fromCountryCode" class="code">India</p>
                                        </label>
                                    </div>
                                    <div class="bussw_inputBox selectHtlCity  ">
                                        <label for="toCity" class="lbl_input latoBold makeFlex column"><span
                                                data-cy="toCity" class="appendBottom5">To</span>
                                            <select id="toCity" data-cy="fromCityVal"
                                                class="bussw_inputField font30 latoBlack">
                                                <option>Delhi, Delhi</option>
                                                <option>Mumbai</option>
                                                <option>Banglore</option>
                                                <option>Pune</option>
                                            </select>
                                            <p data-cy="toCountryCode" class="code">India</p>
                                        </label>
                                    </div>
                                    <div class="bussw_inputBox dayPickerRailWrap dates  ">
                                        <label for="travelDate" class="lbl_input latoBold makeFlex column"><span
                                                data-cy="travelDate" class="appendBottom5 downArrow">Travel Date</span>
                                            <div class="bd-example">
                                                <div class="input-group">
                                                    <input type="text" class="form-control vanila-datepicker"
                                                        placeholder="Date"
                                                        style='opacity: 1;font-size: 18px;font-family: "Lato", sans-serif;'>
                                                </div>
                                            </div>
                                            <p data-cy="departureDay" class="code">Saturday</p>
                                        </label>
                                    </div>
                                </div>
                                <p class="makeFlex vrtlCenter">
                                <div class="form-group">
                                    <div class="d-flex form-check form-check-inline justify-content-center btn_new_style"
                                        style="padding-left: 0;">
                                        <button type="button" class="bg_gradient btn btn_style2 new_style">Search</button>
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
