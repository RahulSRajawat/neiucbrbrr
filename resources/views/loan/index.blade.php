@extends('layouts.app')
@section('title', 'Loans')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="card responsive">
                        <div class="card-header justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Loan Application Form</h4>
                            </div>
                        </div>
                        <table id="basic-table" class="table table-responsive" role="grid">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Loan Details</th>
                                    <th>Apply</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Personal Loan</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Business Loan</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Gold Loan</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Home Loan (Salaried Employed)</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Home Loan (Self Employed)</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Loan Against Property (Salaried Employed)</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>
                                        <div class="align-items-center">
                                            <h6>Loan Against Property (Self Employed)</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div><button type="button" class="btn btn-soft-primary">Apply</button></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between pb-4">
                            <div class="card-body p-0">
                                <div class="user-post">
                                    <a href="javascript:void(0);"><img src="{{ asset('assets/images/pages/001-page.webp') }}"
                                            alt="post-image" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
