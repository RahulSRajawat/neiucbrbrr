@extends('layouts.app')
@section('title', 'Add Recharge Plan')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="white_bg user_details">
                                <ul class="heads">
                                    <li>Name :</li>
                                    <li>Mobile :</li>
                                    <li>Month Limit :</li>
                                </ul>
                                @foreach ($details as $detail)
                                <ul class="details">
                                    <li><i class="fa fa-user"></i> {{ $detail->fname }} {{ $detail->lname }}</li>
                                    <li><i class="fa fa-mobile"></i> {{ $detail->mobile }}</li>
                                    <li class="rem-limit"><i class="fa fa-inr"></i> 25000.00</li>
                                </ul>
                                @endforeach
                            </div>
                            <div class="benelist_btn">
                                <ul>
                                    <li>
                                        <button class="btn changepin" id="changepin"><i class="fa fa-key"></i> Change MPIN</button>
                                    </li>
                                    <li>
                                        <button class="btn addnew-bene" id="addnew_bene"><i class="fa fa-user"></i> Register Beneficiary</button>
                                    </li>
                                    <li>
                                        <button class="btn resend-pin"> <i class="fa fa-key"></i> Forgotten MPIN?</button>
                                    </li>
                                    <!--<li> <button class="btn fetch-bene" data-id="3808244"><i class='fa fa-search-plus'></i> Fetch Beneficiary</button></li>-->
                                </ul>
                            </div>
                            <div class="white_bg half_padd change-pin" id="change-pin" style="display: none;">
                                <div class="close_panel_btn" id="close_panel_btn0"><a href="javascript:" class="btn-close-mpin"><i class="fa fa-close"></i></a></div>
                                <form class="one_col" id="update-pin" method="post" accept-charset="utf-8">
                                    <div class="row pos_rel">
                                        <div class="head">Change MPIN</div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Old PIN* :</label>
                                                <input type="text" name="oldpin" id="oldpin" data-lpignore="true" pattern="[0-9]{4}" maxlength="4" class="form-control" placeholder="Enter Old Pin" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>New PIN* :</label>
                                                <input type="text" name="newpin" id="newpin" data-lpignore="true" pattern="[0-9]{4}" maxlength="4" class="form-control" placeholder="Enter New Pin" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-danger update-pin">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="white_bg add-bene half_padd" id="add_bene" style="display: none;">
                                <div class="close_panel_btn" id="close_panel_btn1"><a href="javascript:" class="btn-close-bene"><i class="fa fa-close"></i></a></div>
                                <form class="one_col" name="bene-search" id="add-new-receiver" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="verified" value="0" id="is-verified">
                                    <div class="row pos_rel">
                                        <div class="head">Register Beneficiary</div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select Type* :</label>
                                                <select class="form-control select_search select-bank banktype select2-hidden-accessible" name="bank" required="" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                    <option value="0">IMPS Bank</option>
                                                    <option value="1">Gramin Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select Bank* :</label>
                                                <select class="form-control  select-bank impsbank select_search select2-hidden-accessible" name="bankname" data-placeholder="Select Bank Name" required="" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                    <option></option>
                                                    <option value="2" data-allow="1" data-aclimit="0" data-ifsc="ABHY0065051" data-ifsctype="2" data-acnumber="0">ABHYUDAYA COOPERATIVE BANK LIMITED</option>
                                                    <option value="4" data-allow="1" data-aclimit="15" data-ifsc="ADCB0000001" data-ifsctype="2" data-acnumber="0">ABU DHABI COMMERCIAL BANK</option>
                                                    <option value="157" data-allow="1" data-aclimit="0" data-ifsc="UTIB0SACBL1" data-ifsctype="2" data-acnumber="0">ACBL ASHOKNAGAR COOPERATIVE BANK LIMITED</option>
                                                    <option value="8" data-allow="1" data-aclimit="0" data-ifsc="AMCB0000001" data-ifsctype="2" data-acnumber="0">AHMEDABAD MERCANTILE COOPERATIVE BANK</option>
                                                    <option value="9" data-allow="1" data-aclimit="0" data-ifsc="AIRP0000001" data-ifsctype="2" data-acnumber="0">AIRTEL PAYMENTS BANK LIMITED</option>
                                                    <option value="650" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CAACOB" data-ifsctype="2" data-acnumber="0">AKHAND ANAND COOPERATIVE BANK LIMITED</option>
                                                    <option value="10" data-allow="1" data-aclimit="0" data-ifsc="AKJB0000001" data-ifsctype="2" data-acnumber="0">AKOLA JANATA COMMERCIAL COOPERATIVE BANK</option>
                                                    <option value="758" data-allow="1" data-aclimit="0" data-ifsc="ICIC00AJHCB" data-ifsctype="2" data-acnumber="0">AMBARNATH JAI HIND COOPERATIVE BANK LIMITED</option>
                                                    <option value="1847" data-allow="1" data-aclimit="0" data-ifsc="APGV0002224" data-ifsctype="2" data-acnumber="0">ANDHRA PRADESH GRAMIN VIKAS BANK</option>
                                                    <option value="20" data-allow="1" data-aclimit="0" data-ifsc="APGB0000001" data-ifsctype="2" data-acnumber="0">ANDHRA PRAGATHI GRAMIN BANK</option>
                                                    <option value="1" data-allow="1" data-aclimit="0" data-ifsc="APMC0000001" data-ifsctype="2" data-acnumber="0">AP MAHESH COOPERATIVE URBAN BANK LIMITED</option>
                                                    <option value="21" data-allow="1" data-aclimit="0" data-ifsc="ASBL0000008" data-ifsctype="2" data-acnumber="0">APNA SAHAKARI BANK LIMITED</option>
                                                    <option value="1852" data-allow="1" data-aclimit="0" data-ifsc="BKID0ARYAGB" data-ifsctype="2" data-acnumber="0">ARYA VART GRAMIN BANK</option>
                                                    <option value="25" data-allow="1" data-aclimit="13,14,15,16" data-ifsc="PUNB0RRBAGB" data-ifsctype="2" data-acnumber="0">ASSAM GRAMIN VIKASH BANK</option>
                                                    <option value="26" data-allow="1" data-aclimit="0" data-ifsc="AUBL0000001" data-ifsctype="2" data-acnumber="0">AU SMALL FINANCE BANK LIMITED</option>
                                                    <option value="1916" data-allow="1" data-aclimit="0" data-ifsc="YESB0AURDCC" data-ifsctype="2" data-acnumber="">AURANGABAD DCC BANK HO</option>
                                                    <option value="32" data-allow="1" data-aclimit="0" data-ifsc="UTIB0000006" data-ifsctype="2" data-acnumber="0">AXIS BANK</option>
                                                    <option value="1353" data-allow="1" data-aclimit="0" data-ifsc="GSCB0BKD001" data-ifsctype="2" data-acnumber="0">BANASKANTHA DISTRICT CENTRAL COOPERATIVE BANK LIMI</option>
                                                    <option value="1887" data-allow="1" data-aclimit="0" data-ifsc="ICIC00BDCBL" data-ifsctype="2" data-acnumber="0">banda district co-operative bank ltd</option>
                                                    <option value="174" data-allow="1" data-aclimit="0" data-ifsc="BDBL0000001" data-ifsctype="2" data-acnumber="0">BANDHAN BANK LIMITED</option>
                                                    <option value="177" data-allow="1" data-aclimit="0" data-ifsc="BOFA0MM6205" data-ifsctype="2" data-acnumber="0">BANK OF AMERICA</option>
                                                    <option value="179" data-allow="1" data-aclimit="" data-ifsc="BARB0NAJDEL" data-ifsctype="2" data-acnumber="0">BANK OF BARODA - BOB</option>
                                                    <option value="181" data-allow="1" data-aclimit="0" data-ifsc="BKID0000001" data-ifsctype="0" data-acnumber="0">BANK OF INDIA - BOI</option>
                                                    <option value="184" data-allow="1" data-aclimit="11,12" data-ifsc="MAHB0000001" data-ifsctype="2" data-acnumber="0">BANK OF MAHARASHTRA - BOM</option>
                                                    <option value="189" data-allow="1" data-aclimit="0" data-ifsc="BARC0000001" data-ifsctype="2" data-acnumber="0">BARCLAYS BANK</option>
                                                    <option value="190" data-allow="1" data-aclimit="" data-ifsc="BARB0BGGBXX" data-ifsctype="2" data-acnumber="0">BARODA GUJARAT GRAMIN BANK</option>
                                                    <option value="191" data-allow="1" data-aclimit="14,15" data-ifsc="BARB0BRGBXX" data-ifsctype="2" data-acnumber="0">BARODA RAJASTHAN GRAMIN BANK</option>
                                                    <option value="192" data-allow="1" data-aclimit="0" data-ifsc="BARB0BUPGBX" data-ifsctype="2" data-acnumber="0">BARODA UTTAR PRADESH GRAMIN BANK</option>
                                                    <option value="193" data-allow="1" data-aclimit="0" data-ifsc="BACB0000001" data-ifsctype="2" data-acnumber="0">BASSEIN CATHOLIC COOPERATIVE BANK LIMITED</option>
                                                    <option value="195" data-allow="1" data-aclimit="0" data-ifsc="BCBM0000001" data-ifsctype="2" data-acnumber="0">BHARAT COOPERATIVE BANK MUMBAI LIMITED</option>
                                                    <option value="1350" data-allow="1" data-aclimit="0" data-ifsc="GSCB0BVN001" data-ifsctype="2" data-acnumber="0">BHAVNAGAR DISTRICT CENTRAL COOPERATIVE BANK LIMITE</option>
                                                    <option value="1927" data-allow="1" data-aclimit="0" data-ifsc="PUNB0MBGB06" data-ifsctype="0" data-acnumber="0">BIHAR GRAMIN BANK</option>
                                                    <option value="167" data-allow="1" data-aclimit="11" data-ifsc="BNPA0000001" data-ifsctype="2" data-acnumber="0">BNP PARIBAS BANK</option>
                                                    <option value="199" data-allow="1" data-aclimit="0" data-ifsc="CNRB0005155" data-ifsctype="0" data-acnumber="4">CANARA BANK</option>
                                                    <option value="200" data-allow="1" data-aclimit="0" data-ifsc="CLBL0000001" data-ifsctype="2" data-acnumber="0">CAPITAL SMALL FINANCE BANK LIMITED</option>
                                                    <option value="201" data-allow="1" data-aclimit="0" data-ifsc="CSBK0000001" data-ifsctype="2" data-acnumber="0">CATHOLIC SYRIAN BANK LIMITED</option>
                                                    <option value="207" data-allow="1" data-aclimit="10" data-ifsc="CBIN0011414" data-ifsctype="2" data-acnumber="0">CENTRAL BANK OF INDIA</option>
                                                    <option value="1131" data-allow="1" data-aclimit="0" data-ifsc="SRCB0CNS001" data-ifsctype="2" data-acnumber="0">CHEMBUR NAGARIK SAHAKARI BANK</option>
                                                    <option value="210" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRCHGB" data-ifsctype="2" data-acnumber="0">CHHATTISGARH GRAMIN BANK</option>
                                                    <option value="212" data-allow="1" data-aclimit="0" data-ifsc="CITI0000001" data-ifsctype="2" data-acnumber="0">CITI BANK</option>
                                                    <option value="214" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CCBL06" data-ifsctype="2" data-acnumber="0">CITIZEN CREDIT COOPERATIVE BANK LIMITED</option>
                                                    <option value="217" data-allow="1" data-aclimit="0" data-ifsc="CIUB0000001" data-ifsctype="0" data-acnumber="3">CITY UNION BANK LIMITED</option>
                                                    <option value="1895" data-allow="1" data-aclimit="0" data-ifsc="DBSS0IN0811" data-ifsctype="0" data-acnumber="0">DBS</option>
                                                    <option value="227" data-allow="1" data-aclimit="0" data-ifsc="DCBL0000001" data-ifsctype="2" data-acnumber="0">DCB BANK LIMITED</option>
                                                    <option value="1800" data-allow="1" data-aclimit="0" data-ifsc="YESB0DNB011" data-ifsctype="2" data-acnumber="0">DELHI NAGRIK SEH BANK</option>
                                                    <option value="1913" data-allow="1" data-aclimit="0" data-ifsc="BKDN0700000" data-ifsctype="2" data-acnumber="0">DENA GUJARAT GRAMIN BANK</option>
                                                    <option value="233" data-allow="1" data-aclimit="0" data-ifsc="DBSS0000001" data-ifsctype="2" data-acnumber="0">DEVELOPMENT BANK OF SINGAPORE - DBS</option>
                                                    <option value="235" data-allow="1" data-aclimit="0" data-ifsc="DLXB0000192" data-ifsctype="2" data-acnumber="0">DHANALAKSHMI BANK</option>
                                                    <option value="1910" data-allow="1" data-aclimit="0" data-ifsc="ICIC00FDCCB" data-ifsctype="0" data-acnumber="0">District Co Operative Bank Ltd Faizabad</option>
                                                    <option value="1892" data-allow="1" data-aclimit="0" data-ifsc="ICIC00BBDCB" data-ifsctype="0" data-acnumber="0">District Cooperative Bank limited</option>
                                                    <option value="238" data-allow="1" data-aclimit="0" data-ifsc="DNSB0000001" data-ifsctype="2" data-acnumber="0">DOMBIVLI NAGARI SAHAKARI BANK LIMITED</option>
                                                    <option value="241" data-allow="1" data-aclimit="0" data-ifsc="ESFB0000001" data-ifsctype="2" data-acnumber="0">EQUITAS SMALL FINANCE BANK LIMITED</option>
                                                    <option value="242" data-allow="1" data-aclimit="0" data-ifsc="ESMF0000001" data-ifsctype="2" data-acnumber="0">ESAF SMALL FINANCE BANK LIMITED</option>
                                                    <option value="245" data-allow="1" data-aclimit="0" data-ifsc="ICIC00ETAWH" data-ifsctype="2" data-acnumber="0">ETAWAH DISTRICT COOPERATIVE BANK LIMITED</option>
                                                    <option value="259" data-allow="1" data-aclimit="14" data-ifsc="FDRL0001678" data-ifsctype="0" data-acnumber="4">FEDERAL BANK</option>
                                                    <option value="261" data-allow="1" data-aclimit="0" data-ifsc="FINO0001001" data-ifsctype="2" data-acnumber="0">FINO PAYMENTS BANK LIMITED</option>
                                                    <option value="263" data-allow="1" data-aclimit="15" data-ifsc="FIRN0000001" data-ifsctype="2" data-acnumber="0">FIRSTRAND BANK LIMITED</option>
                                                    <option value="264" data-allow="1" data-aclimit="0" data-ifsc="PJSB0000004" data-ifsctype="2" data-acnumber="0">GOPINATH PATIL PARSIK BANK</option>
                                                    <option value="309" data-allow="1" data-aclimit="0" data-ifsc="HDFC0000001" data-ifsctype="0" data-acnumber="0">HDFC BANK</option>
                                                    <option value="1859" data-allow="1" data-aclimit="0" data-ifsc="PUNB0HPGB04" data-ifsctype="2" data-acnumber="0">HIMACHAL GRAMIN BANK</option>
                                                    <option value="653" data-allow="1" data-aclimit="0" data-ifsc="HPSC0000011" data-ifsctype="2" data-acnumber="0">HIMACHAL PRADESH STATE COOPERATIVE BANK LIMITED</option>
                                                    <option value="654" data-allow="1" data-aclimit="0" data-ifsc="HSBC0000001" data-ifsctype="2" data-acnumber="0">HSBC BANK</option>
                                                    <option value="736" data-allow="1" data-aclimit="0" data-ifsc="ICIC00HSBLW" data-ifsctype="2" data-acnumber="0">HUTATMA SAHAKARI BANK LIMITED</option>
                                                    <option value="656" data-allow="1" data-aclimit="0" data-ifsc="ICIC0000001" data-ifsctype="0" data-acnumber="4">ICICI BANK LIMITED</option>
                                                    <option value="761" data-allow="1" data-aclimit="13,14,15,16" data-ifsc="IBKL0000001" data-ifsctype="2" data-acnumber="0">IDBI BANK</option>
                                                    <option value="916" data-allow="1" data-aclimit="0" data-ifsc="IDFB0000001" data-ifsctype="2" data-acnumber="0">IDFC BANK LIMITED</option>
                                                    <option value="1858" data-allow="1" data-aclimit="0" data-ifsc="IPOS0000001" data-ifsctype="2" data-acnumber="0">INDIA POST PAYMENT BANK</option>
                                                    <option value="921" data-allow="1" data-aclimit="0" data-ifsc="IDIB000N120" data-ifsctype="2" data-acnumber="0">INDIAN BANK</option>
                                                    <option value="924" data-allow="1" data-aclimit="15" data-ifsc="IOBA0000997" data-ifsctype="0" data-acnumber="4">INDIAN OVERSEAS BANK - IOB</option>
                                                    <option value="927" data-allow="1" data-aclimit="0" data-ifsc="INDB0000001" data-ifsctype="0" data-acnumber="4">INDUSIND BANK</option>
                                                    <option value="1860" data-allow="1" data-aclimit="12" data-ifsc="VYSA0000001" data-ifsctype="2" data-acnumber="0">ING VYSYA BANK LTD</option>
                                                    <option value="946" data-allow="1" data-aclimit="0" data-ifsc="JJSB0000001" data-ifsctype="2" data-acnumber="0">JALGAON JANATA SAHAKARI BANK LIMITED</option>
                                                    <option value="547" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CJMCBL" data-ifsctype="2" data-acnumber="0">JALNA MERCHANTS COOPERATIVE BANK LIMITED </option>
                                                    <option value="948" data-allow="1" data-aclimit="0" data-ifsc="JAKA0NARAIN" data-ifsctype="2" data-acnumber="0">JAMMU AND KASHMIR BANK LIMITED</option>
                                                    <option value="109" data-allow="1" data-aclimit="0" data-ifsc="JAKA0GRAMEN" data-ifsctype="2" data-acnumber="0">JAMMU AND KASHMIR GRAMEEN BANK</option>
                                                    <option value="1914" data-allow="1" data-aclimit="0" data-ifsc="JSFB0CPC002" data-ifsctype="0" data-acnumber="0">JANA SMALL FINANCE BANK LTD</option>
                                                    <option value="950" data-allow="1" data-aclimit="0" data-ifsc="JSBL0000002" data-ifsctype="2" data-acnumber="0">JANAKALYAN SAHAKARI BANK LIMITED</option>
                                                    <option value="952" data-allow="1" data-aclimit="0" data-ifsc="JANA0000001" data-ifsctype="2" data-acnumber="0">JANASEVA SAHAKARI BANK LIMITED</option>
                                                    <option value="107" data-allow="1" data-aclimit="0" data-ifsc="JSBP0000016" data-ifsctype="2" data-acnumber="0">JANATA SAHAKARI BANK LIMITED</option>
                                                    <option value="729" data-allow="1" data-aclimit="0" data-ifsc="JSBP0000001" data-ifsctype="2" data-acnumber="0">JANTA SAHAKARI BANK LIMITED</option>
                                                    <option value="957" data-allow="1" data-aclimit="0" data-ifsc="KAIJ0000001" data-ifsctype="2" data-acnumber="0">KALLAPPANNA AWADE ICHALKARANJI JANATA SAHAKARI BAN</option>
                                                    <option value="959" data-allow="1" data-aclimit="0" data-ifsc="KCCB0000001" data-ifsctype="2" data-acnumber="0">KALUPUR COMMERCIAL COOPERATIVE BANK</option>
                                                    <option value="961" data-allow="1" data-aclimit="0" data-ifsc="KJSB0000001" data-ifsctype="2" data-acnumber="0">KALYAN JANATA SAHAKARI BANK</option>
                                                    <option value="1399" data-allow="1" data-aclimit="0" data-ifsc="KSCB0016001" data-ifsctype="2" data-acnumber="0">KANARA DISTRICT CENTRAL COOPERATIVE BANK</option>
                                                    <option value="1051" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CKMNSB" data-ifsctype="2" data-acnumber="0">KANKARIA MANINAGAR COOPERATIVE BANK LIMITED</option>
                                                    <option value="966" data-allow="1" data-aclimit="16" data-ifsc="KARB0000001" data-ifsctype="0" data-acnumber="3">KARNATAKA BANK LIMITED</option>
                                                    <option value="967" data-allow="1" data-aclimit="0" data-ifsc="KVGB0000001" data-ifsctype="2" data-acnumber="0">KARNATAKA VIKAS GRAMIN BANK</option>
                                                    <option value="968" data-allow="1" data-aclimit="0" data-ifsc="KVBL0004106" data-ifsctype="0" data-acnumber="4">KARUR VYSYA BANK</option>
                                                    <option value="1849" data-allow="1" data-aclimit="0" data-ifsc="UBIN0RRBKGS" data-ifsctype="2" data-acnumber="0">KASHI GOMTI SAMYUT GRAMIN BANK</option>
                                                    <option value="1845" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRCKGB" data-ifsctype="2" data-acnumber="0">KAVERI KALPATARU GRAMIN BANK</option>
                                                    <option value="971" data-allow="1" data-aclimit="0" data-ifsc="KLGB0000001" data-ifsctype="2" data-acnumber="0">KERALA GRAMIN BANK</option>
                                                    <option value="989" data-allow="1" data-aclimit="10,12,14" data-ifsc="KKBK0RTGSMI" data-ifsctype="2" data-acnumber="0">KOTAK MAHINDRA BANK LIMITED</option>
                                                    <option value="1897" data-allow="1" data-aclimit="0" data-ifsc="LAVB0000101" data-ifsctype="0" data-acnumber="0">Lakshmi Vilas bank</option>
                                                    <option value="1842" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRLDGB" data-ifsctype="2" data-acnumber="0">LANGPI DEHANGI RURAL BANK</option>
                                                    <option value="1032" data-allow="1" data-aclimit="0" data-ifsc="LAVB0000478" data-ifsctype="2" data-acnumber="0">LAXMI VILAS BANK</option>
                                                    <option value="1037" data-allow="1" data-aclimit="0" data-ifsc="IBKL0478LOK" data-ifsctype="2" data-acnumber="0">LOKMANGAL COOPERATIVE BANK LIMITED</option>
                                                    <option value="1040" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRMBGB" data-ifsctype="2" data-acnumber="0">MADHYA BHARAT GRAMIN BANK</option>
                                                    <option value="1850" data-allow="1" data-aclimit="0" data-ifsc="PUNB0MBGB06" data-ifsctype="2" data-acnumber="0">MADHYA BIHAR GRAMIN BANK</option>
                                                    <option value="1931" data-allow="1" data-aclimit="0" data-ifsc="MCBL0960007" data-ifsctype="2" data-acnumber="0">MAHANAGAR CO-OP BANK LTD</option>
                                                    <option value="1043" data-allow="1" data-aclimit="0" data-ifsc="MCBL0000001" data-ifsctype="2" data-acnumber="0">MAHANAGAR COOPERATIVE BANK</option>
                                                    <option value="1044" data-allow="1" data-aclimit="0" data-ifsc="MAHB0RRBMGB" data-ifsctype="2" data-acnumber="0">MAHARASHTRA GRAMIN BANK</option>
                                                    <option value="1760" data-allow="1" data-aclimit="0" data-ifsc="YESB0MCA002" data-ifsctype="2" data-acnumber="0">MEGHALAYA COOPERATIVE APEX BANK </option>
                                                    <option value="1841" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRMEGB" data-ifsctype="2" data-acnumber="0">MEGHALAYA RURAL BANK</option>
                                                    <option value="1840" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRMIGB" data-ifsctype="2" data-acnumber="0">MIZORAM RURAL BANK</option>
                                                    <option value="1923" data-allow="1" data-aclimit="0" data-ifsc="YESB0NDCB01" data-ifsctype="0" data-acnumber="0">Nainital District Cooperative Bank</option>
                                                    <option value="1125" data-allow="1" data-aclimit="0" data-ifsc="YESB0NBL002" data-ifsctype="2" data-acnumber="0">NATIONAL COOPERATIVE BANK LIMITED</option>
                                                    <option value="1899" data-allow="1" data-aclimit="0" data-ifsc="IBKL01870N1" data-ifsctype="2" data-acnumber="0">NATIONAL URBAN COOPERATIVE BANK LIMITED</option>
                                                    <option value="1075" data-allow="1" data-aclimit="0" data-ifsc="NKGS0000049" data-ifsctype="2" data-acnumber="0">NKGSB COOPERATIVE BANK LIMITED</option>
                                                    <option value="707" data-allow="1" data-aclimit="0" data-ifsc="ICIC00NESFB" data-ifsctype="2" data-acnumber="0">NORTH EAST SMALL FINANCE BANK LIMITED</option>
                                                    <option value="1941" data-allow="1" data-aclimit="0" data-ifsc="NSPB0000001" data-ifsctype="2" data-acnumber="0">NSDL Payments Bank Limited</option>
                                                    <option value="1078" data-allow="1" data-aclimit="0" data-ifsc="NNSB0000001" data-ifsctype="2" data-acnumber="0">NUTAN NAGARIK SAHAKARI BANK LIMITED</option>
                                                    <option value="922" data-allow="1" data-aclimit="0" data-ifsc="IOBA0ROGB01" data-ifsctype="2" data-acnumber="0">ODISHA GRAMEEN BANK</option>
                                                    <option value="1896" data-allow="1" data-aclimit="0" data-ifsc="IDIB0PLB001" data-ifsctype="0" data-acnumber="0">PALLAVA GRAMA BANK</option>
                                                    <option value="447" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CPCB01" data-ifsctype="2" data-acnumber="0">PARSHWANATH COOPERATIVE BANK LIMITED </option>
                                                    <option value="1082" data-allow="1" data-aclimit="14,15" data-ifsc="UCBA0RRBPBG" data-ifsctype="2" data-acnumber="0">PASCHIM BANGA GRAMIN BANK</option>
                                                    <option value="894" data-allow="1" data-aclimit="0" data-ifsc="IBKL0087PSB" data-ifsctype="2" data-acnumber="0">PAVANA SAHAKARI BANK LIMITED</option>
                                                    <option value="1085" data-allow="1" data-aclimit="0" data-ifsc="PYTM0000001" data-ifsctype="2" data-acnumber="0">PAYTM PAYMENTS BANK LIMITED</option>
                                                    <option value="1092" data-allow="1" data-aclimit="14,15" data-ifsc="PKGB0000001" data-ifsctype="2" data-acnumber="0">PRAGATHI KRISHNA GRAMIN BANK</option>
                                                    <option value="1095" data-allow="1" data-aclimit="0" data-ifsc="PMEC0000001" data-ifsctype="2" data-acnumber="0">PRIME COOPERATIVE BANK LIMITED</option>
                                                    <option value="1001" data-allow="1" data-aclimit="0" data-ifsc="KKBK0PNSB01" data-ifsctype="2" data-acnumber="0">PRIYADARSHANI NAGARI SAHAKARI BANK </option>
                                                    <option value="444" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CPCSBL" data-ifsctype="2" data-acnumber="0">PUNE CANTONMENT SAHAKARI BANK LIMITED</option>
                                                    <option value="1907" data-allow="1" data-aclimit="0" data-ifsc="IBKL0548PMC" data-ifsctype="0" data-acnumber="0">PUNE MERCHANTS CO-OPERATIVE BANK LTD</option>
                                                    <option value="783" data-allow="1" data-aclimit="0" data-ifsc="IBKL0548PPC" data-ifsctype="2" data-acnumber="0">PUNE PEOPLES COOPERATIVE BANK LIMITED </option>
                                                    <option value="1098" data-allow="1" data-aclimit="0" data-ifsc="PMCB0000031" data-ifsctype="2" data-acnumber="0">PUNJAB AND MAHARSHTRA COOPERATIVE BANK</option>
                                                    <option value="1099" data-allow="1" data-aclimit="14" data-ifsc="PSIB0000565" data-ifsctype="0" data-acnumber="4">PUNJAB AND SIND BANK</option>
                                                    <option value="1851" data-allow="1" data-aclimit="0" data-ifsc="PUNB0PGB003" data-ifsctype="2" data-acnumber="0">PUNJAB GRAMIN BANK</option>
                                                    <option value="1100" data-allow="1" data-aclimit="0" data-ifsc="PUNB0244200" data-ifsctype="0" data-acnumber="0">PUNJAB NATIONAL BANK - PNB</option>
                                                    <option value="698" data-allow="1" data-aclimit="0" data-ifsc="ICIC00RUCBL" data-ifsctype="2" data-acnumber="0">RAJAPUR URBAN COOPERATIVE BANK LIMITED</option>
                                                    <option value="1109" data-allow="1" data-aclimit="11" data-ifsc="RMGB0000001" data-ifsctype="2" data-acnumber="0">RAJASTHAN MARUDHARA GRAMIN BANK</option>
                                                    <option value="1110" data-allow="1" data-aclimit="0" data-ifsc="RSBL0000001" data-ifsctype="2" data-acnumber="0">RAJGURUNAGAR SAHAKARI BANK LIMITED</option>
                                                    <option value="1111" data-allow="1" data-aclimit="0" data-ifsc="RNSB0000001" data-ifsctype="2" data-acnumber="0">RAJKOT NAGRIK SAHAKARI BANK LIMITED</option>
                                                    <option value="1115" data-allow="1" data-aclimit="0" data-ifsc="RATN0000001" data-ifsctype="2" data-acnumber="0">RBL BANK LIMITED</option>
                                                    <option value="1341" data-allow="1" data-aclimit="0" data-ifsc="GSCB0SKB001" data-ifsctype="2" data-acnumber="0">SABARKANTHA DISTRICT CENTRAL COOPERATIVE BANK LIMI</option>
                                                    <option value="403" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CSBL02" data-ifsctype="2" data-acnumber="0">SADHANA SAHAKARI BANK LIMITED</option>
                                                    <option value="1121" data-allow="1" data-aclimit="0" data-ifsc="SRCB0000001" data-ifsctype="2" data-acnumber="0">SARASWAT COOPERATIVE BANK LIMITED</option>
                                                    <option value="136" data-allow="1" data-aclimit="0" data-ifsc="UTIB0SBPP02" data-ifsctype="2" data-acnumber="0">SARDAR BHILADWALA PARDI PEOPLE COOPERATIVE BANK</option>
                                                    <option value="1855" data-allow="1" data-aclimit="0" data-ifsc="PUNB0HGB001" data-ifsctype="2" data-acnumber="0">SARVA HARYANA GRAMIN BANK</option>
                                                    <option value="1848" data-allow="1" data-aclimit="14" data-ifsc="PUNB0SUPGB5" data-ifsctype="2" data-acnumber="0">SARVA UP GRAMIN BANK</option>
                                                    <option value="1136" data-allow="1" data-aclimit="0" data-ifsc="PSIB0SGB002" data-ifsctype="2" data-acnumber="0">SATLUJ GRAMIN BANK BATHINDA</option>
                                                    <option value="1893" data-allow="1" data-aclimit="0" data-ifsc="CBIN0R20002" data-ifsctype="2" data-acnumber="0">SATPURA NARMADA KSHETRIYA GRAMIN BANK</option>
                                                    <option value="1137" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRSRGB" data-ifsctype="2" data-acnumber="0">SAURASHTRA GRAMIN BANK</option>
                                                    <option value="1925" data-allow="1" data-aclimit="0" data-ifsc="ICIC00SHNSB" data-ifsctype="0" data-acnumber="0">SHIVAJI NAGARI PAITHAN</option>
                                                    <option value="1145" data-allow="1" data-aclimit="0" data-ifsc="SMCB0000001" data-ifsctype="2" data-acnumber="0">SHIVALIK MERCANTILE COOPERATIVE BANK LIMITED</option>
                                                    <option value="1884" data-allow="1" data-aclimit="" data-ifsc="CNRB000SGB7" data-ifsctype="2" data-acnumber="0">SHREYAS GRAMIN BANK</option>
                                                    <option value="756" data-allow="1" data-aclimit="0" data-ifsc="ICIC00ARIHT" data-ifsctype="2" data-acnumber="0">SHRI ARIHANT COOPERATIVE BANK LIMITED</option>
                                                    <option value="695" data-allow="1" data-aclimit="0" data-ifsc="ICIC00SBSBN" data-ifsctype="2" data-acnumber="0">SHRI BASAVESHWAR SAHAKARI BANK </option>
                                                    <option value="1151" data-allow="1" data-aclimit="0" data-ifsc="CRUB0000001" data-ifsctype="2" data-acnumber="0">SHRI CHHATRAPATI RAJASHRI SHAHU URBAN COOPERATIVE</option>
                                                    <option value="300" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CSVCBL" data-ifsctype="2" data-acnumber="0">SHRI VEERSHAIV COOPERATIVE BANK LIMITED</option>
                                                    <option value="1924" data-allow="1" data-aclimit="15" data-ifsc="IBKL01088IC" data-ifsctype="0" data-acnumber="">SIKKIM STATE CO-OPERATIVE BANK LTD</option>
                                                    <option value="388" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CSINDC" data-ifsctype="2" data-acnumber="0">SINDHUDURG DIST CENT COOPERATIVE BANK LIMITED</option>
                                                    <option value="1578" data-allow="1" data-aclimit="0" data-ifsc="IBKL01076SB" data-ifsctype="2" data-acnumber="0">SIWAN CNETRAL COOPERATIVE BANK LIMITED</option>
                                                    <option value="1163" data-allow="1" data-aclimit="16" data-ifsc="SIBL0000001" data-ifsctype="0" data-acnumber="4">SOUTH INDIAN BANK</option>
                                                    <option value="1176" data-allow="1" data-aclimit="0" data-ifsc="SCBL0000001" data-ifsctype="2" data-acnumber="0">STANDARD CHARTERED BANK</option>
                                                    <option value="1885" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRDCGB" data-ifsctype="2" data-acnumber="0">STATE BANK OF HYDERABAD, DECCAN GRAMEENA BANK</option>
                                                    <option value="1177" data-allow="1" data-aclimit="0" data-ifsc="SBIN0000001" data-ifsctype="2" data-acnumber="0">STATE BANK OF INDIA - SBI</option>
                                                    <option value="1180" data-allow="1" data-aclimit="0" data-ifsc="SURY0000001" data-ifsctype="2" data-acnumber="0">SURYODAY SMALL FINANCE BANK LIMITED</option>
                                                    <option value="1181" data-allow="1" data-aclimit="0" data-ifsc="SUTB0248001" data-ifsctype="2" data-acnumber="0">SUTEX COOPERATIVE BANK LIMITED</option>
                                                    <option value="346" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CSUVRN" data-ifsctype="2" data-acnumber="0">SUVARNAYUG SAHAKARI BANK LIMITED</option>
                                                    <option value="1184" data-allow="1" data-aclimit="0" data-ifsc="TMBL0000001" data-ifsctype="2" data-acnumber="0">TAMILNAD MERCANTILE BANK LIMITED</option>
                                                    <option value="1190" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRDCGB" data-ifsctype="2" data-acnumber="0">TELANGANA GRAMEEN BANK</option>
                                                    <option value="1188" data-allow="1" data-aclimit="0" data-ifsc="TSAB0000001" data-ifsctype="2" data-acnumber="0">TELANGANA STATE COOPERATIVE BANK APEX BANK</option>
                                                    <option value="1194" data-allow="1" data-aclimit="0" data-ifsc="ICIC00ADRSH" data-ifsctype="2" data-acnumber="0">THE ADARSH COOPERATIVE URBAN BANK LIMITED</option>
                                                    <option value="863" data-allow="1" data-aclimit="0" data-ifsc="IBKL0116AUC" data-ifsctype="2" data-acnumber="0">THE AJARA URBAN COOPERATIVE BANK LIMITED</option>
                                                    <option value="1217" data-allow="1" data-aclimit="0" data-ifsc="IBKL01077BD" data-ifsctype="2" data-acnumber="0">THE BEGUSARAI DISTRICT CENTRAL COOPERATIVE BANK</option>
                                                    <option value="626" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CBCCBL" data-ifsctype="2" data-acnumber="0">THE BURDWAN CENTRAL COOPERATIVE BANK LIMITED</option>
                                                    <option value="1240" data-allow="1" data-aclimit="0" data-ifsc="COSB0000001" data-ifsctype="2" data-acnumber="0">THE COSMOS COOPERATIVE BANK LIMITED</option>
                                                    <option value="1939" data-allow="1" data-aclimit="0" data-ifsc="ICIC00AGDCB" data-ifsctype="0" data-acnumber="0">THE DISTRICT CO-OPERATIVE BANK LTD AGRA</option>
                                                    <option value="333" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CTGCUB" data-ifsctype="2" data-acnumber="0">THE GAYATRI COOPERATIVE URBAN BANK LIMITED</option>
                                                    <option value="1308" data-allow="1" data-aclimit="0" data-ifsc="GSCB0000001" data-ifsctype="2" data-acnumber="0">THE GUJARAT STATE CO-OPERATIVE BANK LTD</option>
                                                    <option value="1355" data-allow="1" data-aclimit="0" data-ifsc="GSCB0ADC001" data-ifsctype="0" data-acnumber="0">THE GUJARAT STATE CO-OPERATIVE BANK LTD</option>
                                                    <option value="1937" data-allow="1" data-aclimit="0" data-ifsc="YESB0HDCCB2" data-ifsctype="0" data-acnumber="">THE HASSAN DISTRICT CENTRAL CO-OPERATIVE BANK LTD</option>
                                                    <option value="564" data-allow="1" data-aclimit="0" data-ifsc="HCBL0000001" data-ifsctype="2" data-acnumber="0">THE HASTI COOPERATIVE BANK LIMITED</option>
                                                    <option value="1898" data-allow="1" data-aclimit="0" data-ifsc="SVCB0001002" data-ifsctype="0" data-acnumber="0">THE HINDUSTHAN CO OP BANK LIMITED</option>
                                                    <option value="1890" data-allow="1" data-aclimit="0" data-ifsc="APBL0015018" data-ifsctype="0" data-acnumber="0">THE HYDERABAD DISTRICT CO OPERATIVE CENTRAL BANK</option>
                                                    <option value="1377" data-allow="1" data-aclimit="0" data-ifsc="JPCB0000001" data-ifsctype="2" data-acnumber="0">THE JALGAON PEOPELS COOPERATIVE BANK LIMITED</option>
                                                    <option value="1393" data-allow="1" data-aclimit="0" data-ifsc="KUCB0000001" data-ifsctype="2" data-acnumber="0">THE KARAD URBAN COOPERATIVE BANK LIMITED</option>
                                                    <option value="513" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CKUCBL" data-ifsctype="2" data-acnumber="0">THE KOLHAPUR URBAN COOPERATIVE BANK LIMITED</option>
                                                    <option value="721" data-allow="1" data-aclimit="0" data-ifsc="ICIC00KURLA" data-ifsctype="2" data-acnumber="0">THE KURLA NAGARIK SAHAKARI BANK LIMITED</option>
                                                    <option value="1445" data-allow="1" data-aclimit="0" data-ifsc="MSNU0000001" data-ifsctype="2" data-acnumber="0">THE MEHSANA URBAN COOPERATIVE BANK</option>
                                                    <option value="1457" data-allow="1" data-aclimit="0" data-ifsc="MUBL0000001" data-ifsctype="2" data-acnumber="0">THE MUNICIPAL COOPERATIVE BANK LIMITED</option>
                                                    <option value="473" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CMUSLM" data-ifsctype="2" data-acnumber="0">THE MUSLIM COOPERATIVE BANK LIMITED</option>
                                                    <option value="1460" data-allow="1" data-aclimit="16" data-ifsc="NTBL0000001" data-ifsctype="2" data-acnumber="0">THE NAINITAL BANK LIMITED</option>
                                                    <option value="1920" data-allow="1" data-aclimit="15" data-ifsc="HDFC0CTNCBL" data-ifsctype="0" data-acnumber="">The Navnirman Co - Op. Bank Ltd.</option>
                                                    <option value="1894" data-allow="1" data-aclimit="0" data-ifsc="RSCB0029009" data-ifsctype="0" data-acnumber="0">THE RAJASTHAN STATE COOPERATIVE BANK LTD</option>
                                                    <option value="1932" data-allow="1" data-aclimit="0" data-ifsc="TNSC00110000" data-ifsctype="0" data-acnumber="0">THE RAMANATHAPURAM DISTRICT CENTRAL CO-OPERATIVE B</option>
                                                    <option value="792" data-allow="1" data-aclimit="0" data-ifsc="IBKL0487SDC" data-ifsctype="2" data-acnumber="0">THE SANGLI DISTRICT CENTRAL COOPERATIVE BANK LIMIT</option>
                                                    <option value="1538" data-allow="1" data-aclimit="0" data-ifsc="GSCB0USAURA" data-ifsctype="2" data-acnumber="0">THE SAURASHTRA COOPERATIVE BANK LIMITED</option>
                                                    <option value="1563" data-allow="1" data-aclimit="0" data-ifsc="SVCB0000001" data-ifsctype="2" data-acnumber="0">THE SHAMRAO VITHAL COOPERATIVE BANK</option>
                                                    <option value="1581" data-allow="1" data-aclimit="0" data-ifsc="IBKL078SCDC" data-ifsctype="2" data-acnumber="0">THE SOUTH CANARA DISTRICT CENTRAL COOPERATIVE BANK</option>
                                                    <option value="1584" data-allow="1" data-aclimit="0" data-ifsc="SDCB0000001" data-ifsctype="2" data-acnumber="0">THE SURAT DISTRICT COOPERATIVE BANK LIMITED</option>
                                                    <option value="1585" data-allow="1" data-aclimit="0" data-ifsc="SPCB0000001" data-ifsctype="2" data-acnumber="0">THE SURATH PEOPLES COOPERATIVE BANK LIMITED</option>
                                                    <option value="1591" data-allow="1" data-aclimit="0" data-ifsc="TBSB0000001" data-ifsctype="2" data-acnumber="0">THE THANE BHARAT SAHAKARI BANK LIMITED</option>
                                                    <option value="1602" data-allow="1" data-aclimit="0" data-ifsc="TNSC0012000" data-ifsctype="2" data-acnumber="0">THE TIRUVANNAMALAI DISTRICT CENTRAL COOPERATIVE BA</option>
                                                    <option value="1612" data-allow="1" data-aclimit="0" data-ifsc="VARA0000001" data-ifsctype="2" data-acnumber="0">THE VARACHHA COOPERATIVE BANK LIMITED</option>
                                                    <option value="1615" data-allow="1" data-aclimit="0" data-ifsc="HDFC0CTVCBL" data-ifsctype="2" data-acnumber="0">THE VIJAY COOPERATIVE BANK LIMITED</option>
                                                    <option value="1618" data-allow="1" data-aclimit="0" data-ifsc="VSBL0000001" data-ifsctype="2" data-acnumber="0">THE VISHWESHWAR SAHAKARI BANK LIMITED</option>
                                                    <option value="1632" data-allow="1" data-aclimit="0" data-ifsc="TJSB0000001" data-ifsctype="2" data-acnumber="0">TJSB SAHAKARI BANK LIMITED</option>
                                                    <option value="1633" data-allow="1" data-aclimit="0" data-ifsc="PUNB0RRBTGB" data-ifsctype="0" data-acnumber="0">TRIPURA GRAMIN BANK</option>
                                                    <option value="1637" data-allow="1" data-aclimit="14" data-ifsc="UCBA0000610" data-ifsctype="0" data-acnumber="4">UCO BANK</option>
                                                    <option value="1640" data-allow="1" data-aclimit="0" data-ifsc="UJVN0000001" data-ifsctype="2" data-acnumber="0">Ujjivan Small Finance Bank Limited</option>
                                                    <option value="1940" data-allow="1" data-aclimit="0" data-ifsc="UJVN0003571" data-ifsctype="0" data-acnumber="0">UJJIVAN SMALL FINANCE BANK LIMITED DHARMANAGAR</option>
                                                    <option value="1642" data-allow="1" data-aclimit="15" data-ifsc="UBIN0543560" data-ifsctype="2" data-acnumber="0">UNION BANK OF INDIA</option>
                                                    <option value="1922" data-allow="1" data-aclimit="16" data-ifsc="UTBI0RRBLDB" data-ifsctype="0" data-acnumber="">UNITED BANK OF INDIA, LANGPI DEHANGI RURAL BANK, D</option>
                                                    <option value="1646" data-allow="1" data-aclimit="0" data-ifsc="UTKS0000001" data-ifsctype="2" data-acnumber="0">UTKARSH SMALL FINANCE BANK</option>
                                                    <option value="1647" data-allow="1" data-aclimit="0" data-ifsc="CBIN0R40012" data-ifsctype="0" data-acnumber="0">UTTAR BANGA KSHETRIYA GRAMIN BANK</option>
                                                    <option value="1933" data-allow="1" data-aclimit="11" data-ifsc="SBIN0RRUTGB" data-ifsctype="0" data-acnumber="11">UTTARAKHAND GRAMIN BANK</option>
                                                    <option value="1651" data-allow="1" data-aclimit="0" data-ifsc="SBIN0RRUTGB" data-ifsctype="2" data-acnumber="0">UTTARANCHAL GRAMIN BANK</option>
                                                    <option value="1654" data-allow="1" data-aclimit="11" data-ifsc="SBIN0RRVCGB" data-ifsctype="2" data-acnumber="0">VANANCHAL GRAMIN BANK</option>
                                                    <option value="1655" data-allow="1" data-aclimit="0" data-ifsc="VVSB0000001" data-ifsctype="2" data-acnumber="0">VASAI VIKAS SAHAKARI BANK LIMITED</option>
                                                    <option value="1670" data-allow="1" data-aclimit="0" data-ifsc="YESB0YLNS01" data-ifsctype="2" data-acnumber="0">YADAGIRI LNS COOPERATIVE BANK </option>
                                                    <option value="1668" data-allow="1" data-aclimit="0" data-ifsc="YESB0000001" data-ifsctype="0" data-acnumber="4">YES BANK</option>
                                                    <option value="1938" data-allow="1" data-aclimit="0" data-ifsc="ICIC00BULND" data-ifsctype="0" data-acnumber="0">Zila Sahkari Bank Ltd Bulandshahr</option>
                                                    <option value="1886" data-allow="1" data-aclimit="15" data-ifsc="IBKL0066ZSB" data-ifsctype="2" data-acnumber="0">ZILA SAHKARI BANK LTD GHAZIABAD</option>
                                                    <option value="1915" data-allow="1" data-aclimit="0" data-ifsc="ICIC00MUZAF" data-ifsctype="2" data-acnumber="0">ZILA SAHKARI BANK LTD MUZAFFARNAGAR</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Beneficiary Name* :</label>
                                                <input type="text" name="benename" data-lpignore="true" id="benename" class="form-control" pattern="[A-Za-z ]+" placeholder="Enter Beneficiary Name" autocomplete="false" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Account No* :</label>
                                                <input type="text" name="accno" id="acno" data-lpignore="true" pattern="[0-9]+" class="form-control" placeholder="Enter Account No." autocomplete="off" required=""> <span class="account-number"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Confirm Account No* :</label>
                                                <input type="text" name="confirmaccno" data-lpignore="true" id="cacno" pattern="[0-9]+" class="form-control" placeholder="Re-Enter Account No." autocomplete="off" required=""> <span class="caccount-number"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group margin_t_20">
                                                <label>
                                                    <input type="radio" class="isifsc" name="isifsc" value="1" checked=""> I Dont Have?</label>
                                                <label>&nbsp;</label>
                                                <label>
                                                    <input type="radio" class="isifsc" name="isifsc" value="0"> I Have IFSC?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group margin_t_20">
                                                <label>
                                                    <input type="radio" class="only_register" id="only_register" name="only_register" value="0" checked=""> Only Register?</label>
                                                <label>&nbsp;</label>
                                                <label>
                                                    <input type="radio" class="only_register" id="reg_pay" name="only_register" value="1"> Register and Pay?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 amount-field " id="amount-field" style="display: none;">
                                            <div class="form-group">
                                                <label>Enter Amount :</label>
                                                <input type="text" name="amount" id="initiateAmount" data-lpignore="true" pattern="[0-9]+" class="form-control" placeholder="Enter Amount." autocomplete="off"> <span class="txn-amount"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="getifsc">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Select State* :</label>
                                                    <select class="form-control select-state" name="state" style="width: 100%" data-placeholder="Select State">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Select Branch* :</label>
                                                    <select class="form-control select-branch" name="branch" style="width: 100%" data-placeholder="Select Branch">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>IFSC Code :</label>
                                                    <input type="text" name="ifsccode" id="ifsccode" class="form-control" placeholder="Enter IfSC Code" data-lpignore="true" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 receiver-verify">
                                            <div class="form-group">
                                                <label>OTP* :</label>
                                                <input type="text" name="otp" class="form-control" placeholder="Enter OTP" autocomplete="off" required="" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 bene-otp">
                                            <div class="form-group">
                                                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-black btn_mobile margin_t_20 btn-xss re-gen-receiver-otp" title="" data-original-title="Re-Generate OTP"><i class="fa fa-rotate-right"></i> Re-Generate OTP</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger margin_t_20 add-new-receiver"><i class="fa fa-user"></i> Register Beneficiary</button>
                                                    <button type="button" class="btn btn-light margin_t_20 verify-bene-name"><i class="fa fa-check"></i> Verify Account [Fee Rs. 4]</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-black margin_t_20 pull-center our-ifsccode" style="display:none;"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 address" style="display: none"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="white_bg reg_bene_head">
                                <div class="row">
                                    <div class="col-sm-1">Status</div>
                                    <div class="col-sm-2">Bene Name</div>
                                    <div class="col-sm-2">Bank</div>
                                    <div class="col-sm-2">A/C Number</div>
                                    <div class="col-sm-2">Bene Status</div>
                                    <div class="col-sm-3">Amount</div>
                                </div>
                            </div>
                            <div class="white_bg reg_bene_det_wrap" id="listid34682971">
                                <div class="row">
                                    <div class="col-sm-1 reg_bene_det">
                                        <div class="bene_status delete_bene" data-bene="34682971"><i class="fa fa-trash"></i></div>
                                    </div>
                                    <div class="col-sm-2 reg_bene_det">RAHUL SINGH RAJAWAT</div>
                                    <div class="col-sm-2 reg_bene_det">PAYTM PAYMENTS BANK LIMITED</div>
                                    <div class="col-sm-2 reg_bene_det">919755678764</div>
                                    <div class="col-sm-2 reg_bene_det">
                                        <div class="bene_status"><i class="fa fa-check"></i></div>
                                    </div>
                                    <div class="col-sm-3 reg_bene_det">
                                        <form class="one_col dmt-submit" id="confirmTxn" method="post" accept-charset="utf-8">
                                            <input type="hidden" name="receiverToken" value="34682971">
                                            <div class="bene_pro">
                                                <input type="text" name="amount" autocomplete="off" pattern="[0-9]{3,5}" class="form-control" required="true">
                                                <button type="submit" style="width:auto !important;">Pay</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row bene_delete" id="delete34682971" style="display:none;">
                                    <form  class="one_col verify-delete-beneficiary" id="34682971" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="benetoken" value="34682971">
                                        <input type="hidden" name="accno" value="919755678764">
                                        <div class="col-sm-3">
                                            <div class="form-group margin_t_20">
                                                <input type="text" name="otp" id="otp" pattern="[0-9]+" class="form-control" placeholder="Enter OTP Received on Remitter mobile" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-danger margin_t_20 34682971">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 errormsgbene34682971"> </div>
                                    </form>
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
        $('#changepin').click(function() {
            $('#change-pin').toggle(500);
        });
        $('#close_panel_btn0').click(function() {
            $('#change-pin').toggle(500);
        });
        $('#addnew_bene').click(function() {
            $('#add_bene').toggle(500);
        });
        $('#close_panel_btn1').click(function() {
            $('#add_bene').toggle(500);
        });
        $('#only_register').click(function() {
            $('#amount-field').hide();
        });
        $('#reg_pay').click(function() {
            $('#amount-field').show();
        });
    </script>
@endsection
