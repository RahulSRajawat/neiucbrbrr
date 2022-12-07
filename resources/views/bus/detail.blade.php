@extends('layouts.app')
@section('title', 'Bus')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="busTravellersWrapper">
                        <div class="busTravellersContainer">
                            <section class="leftSection appendTop30 appendRight30">
                                <div class="travellerBusInfoDetails makeFlex column">
                                    <div class="appendBottom10 makeFlex font14 latoBold spaceBetween">
                                        <p class="makeFlex latoBold redText"><span>Delhi</span><span
                                                class="iconContainer "><span
                                                    class="ic_arrow_oneway"></span></span><span>Kanpur &nbsp;</span></p>
                                        <span class="latoBold sCapText blackText"> <strong>3 Seats</strong> selected </span>
                                    </div>
                                    <p class="makeFlex spaceBetween appendBottom5 font20 blackText">
                                    <div><span class="latoBlack">Shatabdi Travels</span></div><span class="latoBold">
                                        <span><strong><span> U10</span><span>, U16</span><span>, U28</span></strong>
                                        </span>
                                    </span>
                                    </p>
                                    <div class="makeFlex spaceBetween appendBottom10 font14"><span class="defaultGreyText">
                                            AC Sleeper (2+1) </span>
                                        <div class="pushRight makeRelative"><span
                                                class="latoBold textLeft inlineDisplay deepskyBlueText">View Policies</span>
                                        </div>
                                    </div>
                                    <div class="makeFlex hrtlCenter appendBottom20">
                                        <p class="latoRegular font14 defaultGreyText noShrink"><span
                                                class="rating whiteText textCenter appendRight10 ratingMedium"><span
                                                    class="lato">3.9</span><span class="latoRegular font10">
                                                    /5</span></span><span> 235 Ratings </span> &nbsp;</p>
                                        <ul class="seats latoRegular defaultGreyText font14"></ul>
                                    </div>
                                    <div class="makeFlex row blackText reviewBusInfoWrapper">
                                        <div><span class="makeRelative font22 latoBold">21:00 &nbsp;<span
                                                    class="font16 latoRegular darkGreyText">13 Dec' 22, Tue</span></span>
                                            <div class="makeFlex column maxWidth200 maxHeight200 appendTop15"><span
                                                    class="font16 latoBold appendBottom8 truncate lineHeight18">Delhi -
                                                    <span class="latoRegular">Others</span></span><span
                                                    class=" latoRegular lineHeight14" style="font-size: 11px;">Shatabdi
                                                    travels shop no.14 Morigate Bus Tarminal Opp Mandir wali parking Near
                                                    Kashmiri gate Metro station gate no 2
                                                </span></div>
                                        </div>
                                        <div class="makeFlex column hrtlCenter">
                                            <div class="dottedLine"></div><span class="font12 latoBold defaultGreyText">
                                                8h</span>
                                        </div>
                                        <div><span class="makeRelative font22 latoBold">05:00 &nbsp;<span
                                                    class="font16 latoRegular darkGreyText"> 14 Dec' 22, Wed</span></span>
                                            <div class="makeFlex column maxWidth200 maxHeight200 appendTop15"><span
                                                    class="font16 latoBold appendBottom8 truncate lineHeight18">Kanpur -
                                                    <span class="latoRegular">Faizalganj </span></span><span
                                                    class="font10 latoRegular lineHeight14">Fazalganj</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="trdSelectTraveller">
                                    <h4 class="blackText">Enter Traveller Details</h4>
                                    <div class="trdEditContainer appendTop20">
                                        <div>
                                            <div><span class="font16 latoBold blackText">Seat U10&nbsp;&nbsp;</span><span
                                                    class="font14 blackText">horizontal sleeper</span></div>
                                            <div class="trdForm" id="trv_form_U10">
                                                <form class="makeFlex blackText">
                                                    <div class="formField makeFlex column appendRight20 ">
                                                        <label for="fname">Name</label>
                                                        <div>
                                                            <input class="font14 width300" type="text" name="fname"
                                                                id="fname" maxlength="50" tabindex="0"
                                                                autocomplete="off" value="">
                                                        </div>
                                                    </div>
                                                    <div class="formField makeFlex column appendRight20 ageField">
                                                        <label for="age">Age (in yrs)</label>
                                                        <input class="font14 width101" type="number" id="age"
                                                            name="age" placeholder="" min="1" max="120"
                                                            tabindex="0" value="">
                                                    </div>
                                                    <div
                                                        class="formField genderField makeFlex column appendRight20 width132">
                                                        <label for="gender"> Gender </label>
                                                        <select name="" id="" class="font14 width101">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="tagContainer latoBold font10">
                                                        <div class="primaryTag">PRIMARY</div>
                                                    </div> -->
                                                </form>
                                            </div>
                                        </div>
                                        <div>
                                            <div><span class="font16 latoBold blackText">Seat U16&nbsp;&nbsp;</span><span
                                                    class="font14 blackText">horizontal sleeper</span></div>
                                            <div class="trdForm" id="trv_form_U16">
                                                <form class="makeFlex blackText">
                                                    <div class="formField makeFlex column appendRight20 ">
                                                        <label for="fname">Name</label>
                                                        <div>
                                                            <input class="font14 width300" type="text" name="fname"
                                                                id="fname" maxlength="50" tabindex="0"
                                                                autocomplete="off" value="">
                                                        </div>
                                                    </div>
                                                    <div class="formField makeFlex column appendRight20 ageField">
                                                        <label for="age">Age (in yrs)</label>
                                                        <input class="font14 width101" type="number" id="age"
                                                            name="age" placeholder="" min="1" max="120"
                                                            tabindex="0" value="">
                                                    </div>
                                                    <div
                                                        class="formField genderField makeFlex column appendRight20 width132">
                                                        <label for="gender"> Gender </label>
                                                        <select name="" id="" class="font14 width101">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="tagContainer latoBold font10"></div>
                                                </form>
                                            </div>
                                        </div>
                                        <div>
                                            <div><span class="font16 latoBold blackText">Seat U28&nbsp;&nbsp;</span><span
                                                    class="font14 blackText">horizontal sleeper</span></div>
                                            <div class="trdForm" id="trv_form_U28">
                                                <form class="makeFlex blackText">
                                                    <div class="formField makeFlex column appendRight20 ">
                                                        <label for="fname">Name</label>
                                                        <div>
                                                            <input class="font14 width300" type="text" name="fname"
                                                                id="fname" maxlength="50" tabindex="0"
                                                                autocomplete="off" value="">
                                                        </div>
                                                    </div>
                                                    <div class="formField makeFlex column appendRight20 ageField">
                                                        <label for="age">Age (in yrs)</label>
                                                        <input class="font14 width101" type="number" id="age"
                                                            name="age" placeholder="" min="1" max="120"
                                                            tabindex="0" value="">
                                                    </div>
                                                    <div
                                                        class="formField genderField makeFlex column appendRight20 width132">
                                                        <label for="gender"> Gender </label>
                                                        <select name="" id="" class="font14 width101">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="tagContainer latoBold font10"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="confirmAccountDetailsWrapper appendBottom30">
                                    <h3 class="blackText"> Enter Contact Details </h3>
                                    <div class="makeFlex column confirmFormWrapper">
                                        <div class="makeFlex row">
                                            <div class="inputFieldWrapper emailInputField ">
                                                <label class="font14 latoBold makeFlex" for="contactEmail"><span
                                                        class="blackText labelName greyed">Email Id</span></label>
                                                <div class="makeFlex hrtlCenter filedsWrapper ">
                                                    <div class="makeFlex fullWidth">
                                                        <input type="email" autocomplete="email"
                                                            class="blackText font14 latoRegular InputFieldElement"
                                                            name="email id" id="contactEmail" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inputFieldWrapper mobileInputField ">
                                                <label class="font14 latoBold makeFlex" for="mobileNumber"><span
                                                        class="blackText labelName greyed">Mobile Number</span></label>
                                                <div class="makeFlex hrtlCenter filedsWrapper ">
                                                    <div class="makeFlex fullWidth">
                                                        <input type="text" autocomplete="tel"
                                                            class="blackText font14 latoRegular InputFieldElement"
                                                            name="Mobile Number" id="mobileNumber" maxlength="10"
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gstDetails makeFlex column whiteText closed">
                                            <div class="makeFlex row appendTop25">
                                                <div class="latoBold noSelection lineHeight24"><a
                                                        class="font14 cursorPointer">ENTER GST DETAILS <span
                                                            class="font12">(optional)</span></a></div><img
                                                    class="blueArrowDown"
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAV9JREFUaAXtlT1Ow0AQhWfp0tHkCNyBgo46V0hDHyRMQU4ABUYKddJwBWo6Co5Dly7LPEcjxZJ/Mutd0byV7Nnsz5t5n9exCBsJkAAJkAAJkAAJkAAJkAAJkMD/EAjutHW8ligfEuRSr7U8hJ1b43TDW7xTvWe9flVvKVX4OZ0e61+MLeiY3+jYlSacy0G2UsdVx5rzhrAXGtCCpgi0XS3FQDtB1KQpJrAHeyc2v4EolT7qfSuv10RX8dCEtrP5DTyGb82xSDbRVzw0j9ouC/6X2OTreKvdT6U2s6EmBrnXF/G9NWY/hoqvwpct88R0A8jiMVGgeJQwzcC5JgoVn8fAsIknTOsxe2mi3Y5/Ags9aknHxmQQpz8BU+s7TjZvMWPxkMxnAGpjJjIXn9/AkIkCxZcx0GWiUPHlDED5Nd7oAa3Rbb6wCR+pZi9vJEACJEACJEACJEACJEACJNBD4A+x5nvbCErmpwAAAABJRU5ErkJggg==">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offersForYourWrapper">
                                    <h3 class="blackText"> Offers For You </h3>
                                    <div class="makeFlex row spaceBetween font18 loginPersuadeWrapper">
                                        <div class="makeFlex row persuasionText">
                                            <div class="walletIconWrapper"><img class="walletIcon"
                                                    src="data:image/png;base64,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">
                                            </div><span class="" style="width: auto;">Login and claim wallet
                                                rewards</span>
                                            <div class="loginNowClickContainer"><span
                                                    class="latoBlack font16 darkYellowText ">LOGIN NOW<img
                                                        class="yellowArrow"
                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEUAAAAbCAYAAAAqCUKuAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAARaADAAQAAAABAAAAGwAAAAD9PFDmAAACxElEQVRYCeWZPWhTURiG33NzW60/SF38gQ4WJ2uSZlRrRbCgWxHBQULNptCKOpqk0SRSXDIUiiKCS1WwOAgq2OBSEBehSWzARTp0qIvFQoqQNDm+J/bGk+uVdu25dznfec8d7vvkO9/5iYChTzGDI1LiNSR6IDAdPo1b4izWt2LX3spL2/IdiRuEEmx+u8RocQ7d7EeFIKZNHmuT8e07LLGmfzxJXGH2TOra/2Jjodh7keO0+aYbZ6aMzt/DXV3zio2F0ncbK5bAEMEsu4ynChmMubS2rmjrGdgp3sdxWcccs6TbsafqirQQjSTwzNH01ngoymwpjRMNIE8wuzXzaiUajqTwVtOaobHTRzcaGscnTqOLzICqptvUZgpZDGiaf6Aop/1JzBJClGCYNBuPRJds4M1CGmFHUq0vMsUx3D+OlwRz3ek3W4l9nEfvyxM46ui+gqJME8xjy8IdB4BqWWsO1KrIf32Aw6ovlnLoWqkgxs1NjxL88tDvCPe2h3S/XJXKHXswaP+o4DlJDeuDfo3Joa9WwROLtM75FYKnb4khi4Un7znoU1EKfBCLT7FzdQlX/VZT+JvH/qkpwILViUFf7GjdST+fQZy7layus8gudgZw6lgcy76DUkjjGgvqwzYgwPeAhYFg8s+p2ldQuKW/jDpXW23TSgA/AzbOBOMoOaACTmB6ywum88yQGfq0W14FfnGhuRBO4nNLa3tBVw2Lv2Rxcr2OV7TV0bImUAsIXAol8bGlbQR/qblHDOnz2iBY56GPdnY5ltR9irAwEkrgnaPprdFnn9IEehsSs5w2rQsmZZ57kbFwAi90EHpsLJRyDvsbPOSxqB7UDTNLUpEkpnTNHRs7faprzSuCXt0wgUzylJzWNa/Y2Ezh5ky/egSBTHOVuekFwa0ZC6VzBx7RbIlL7ir3IlP8hzCmCqwbgFf/Nw7FsnFdcrcgAAAAAElFTkSuQmCC"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offersForYou makeFlex column">
                                        <div class="makeFlex spaceBetween appendBottom20 dealsWrapper"><span
                                                class="sprite xRedDeal appendRight20"></span>
                                            <div class="makeFlex column flexOne"><span
                                                    class="appendBottom10 font16 latoBold blackText">Travel Operator
                                                    Deal</span><span class="latoBold font14 greenText">Get INR 50.0 Extra
                                                    OFF applied! You have saved ₹150</span></div>
                                        </div>
                                        <div>
                                            <div class="makeFlex hrtlCenter"><span
                                                    class="sprite couponsIcon appendTop10 appendRight15"></span><span
                                                    class="appendTop10 font16 latoBold blackText">Coupon Code</span></div>
                                            <ul class="makeFlex column couponsOptions couponsOptionsBorder">
                                                <li class="makeFlex spaceBetween unselectedOption bottomLine null">
                                                    <div class="customBack makeFlex column">
                                                        <div class="makeFlex row">
                                                            <div class="couponRowContainer">
                                                                <div style="display: flex;">
                                                                    <input type="radio" name="" id="coupons"
                                                                        style="margin-right: 14px;">
                                                                    <label for="coupons">
                                                                        <div class="makeFlex row"><span
                                                                                class="greenText font16 latoBold  blockDisplay">BUSTRAINPASS</span>
                                                                        </div><span
                                                                            class="appendTop5 appendBottom2 font12 blockDisplay lightGreyText">Travel
                                                                            Pass - Buy for Rs. 99 and get instant Rs. 50 off
                                                                            and 4 vouchers each worth Rs. 50 off on bus/Rs.
                                                                            25 off on train bookings</span>
                                                                    </label>
                                                                </div>
                                                                <div class="couponDiscountContainer"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="makeFlex font14 latoBold couponNotAppliedWrapper">
                                                    <div class="inputFieldWrapper appendBottom15  ">
                                                        <div class="makeFlex hrtlCenter filedsWrapper ">
                                                            <div class="makeFlex fullWidth">
                                                                <input type="text"
                                                                    class="blackText font14 latoRegular InputFieldElement"
                                                                    name="" id="coupon"
                                                                    placeholder="Enter coupon code" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="makeFlex hrtlCenter appendLeft20 couponBtnContainer"><span
                                                            class="couponApplyBtn textCenter">APPLY</span></div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="blackText">Acknowledgement</h3><span class="policyMsg latoBold blackText"><span
                                        class="makeFlex"><span>By proceeding, I agree to MakeMyTrip's <a> User
                                                Agreement</a>,<a> Terms of Service</a> and <a>Privacy
                                                Policy</a></span></span>
                                </span>
                            </section>
                            <section class="rightSection appendTop30">
                                <div class="payNowWrapper">
                                    <div class="paymentBtnWrapper makeFlex column "><a
                                            class="paymentBtn whiteText latoBold font16 capText"><span
                                                class="">Continue to Book Now</span> </a></div>
                                    <div class="paymentDetailsWrapper">
                                        <div class="paymentDetailsListWrapper">
                                            <ul class="paymentDetailsList">
                                                <li class="paymentItem makeFlex font14">
                                                    <div class="productInfoWrapper">
                                                        <p class="productName defaultGreyText">Base Fare</p>
                                                    </div>
                                                    <div class="priceWrapper latoBold darkGreyText"><span
                                                            class="paymentPrice ">₹ 2700</span></div>
                                                </li>
                                                <li class="paymentItem makeFlex font14">
                                                    <div class="productInfoWrapper">
                                                        <p class="productName defaultGreyText">Tax</p>
                                                    </div>
                                                    <div class="priceWrapper latoBold darkGreyText"><span
                                                            class="paymentPrice ">₹ 135</span></div>
                                                </li>
                                                <li class="paymentItem makeFlex font14">
                                                    <div class="productInfoWrapper">
                                                        <p class="productName defaultGreyText">My Deal</p>
                                                    </div>
                                                    <div class="priceWrapper latoBold darkGreyText"><span
                                                            class="paymentPrice greenText">₹ 150</span></div>
                                                </li>
                                                <div
                                                    class="totalPriceWrapper makeFlex spaceBetween font16 latoBold blackText">
                                                    <p class="totalPriceTag makeFlex column"><span
                                                            class="greenText font12 appendBottom5">₹150
                                                            saved</span><span>Total Base Price</span></p>
                                                    <p class="totalPriceValue textRight makeFlex column"><span
                                                            class="redText font14 appendBottom5"><span>₹ </span><span
                                                                class="lineThrough">2835</span></span><span
                                                            class="rupeeSymbol"> ₹2685 </span></p>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
