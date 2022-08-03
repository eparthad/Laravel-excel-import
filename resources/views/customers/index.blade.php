@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Import Excel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <h1>Branch One</h1>
                        <div class="col-sm">
                            <h5>Total Customer: {{  $getCustomerCountData[0]->total_customer_count??'0' }}</h5>
                           
                        </div>
                        <div class="col-sm">
                            <h5>Total Male Customer: {{  $getCustomerCountData[0]->total_male_customer_count??'0' }}</h5>
                        </div>
                        <div class="col-sm">
                            <h5>Total Female Customer: {{  $getCustomerCountData[0]->total_female_customer_count??'0' }}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <h1>Branch Two</h1>
                        <div class="col-sm">
                            <h5>Total Customer: {{  $getCustomerCountData[1]->total_customer_count??'0' }}</h5>
                           
                        </div>
                        <div class="col-sm">
                            <h5>Total Male Customer: {{  $getCustomerCountData[1]->total_male_customer_count??'0' }}</h5>
                        </div>
                        <div class="col-sm">
                            <h5>Total Female Customer: {{  $getCustomerCountData[1]->total_female_customer_count??'0' }}</h5>
                        </div>
                    </div>

                    <table class="table table-info">
                        <tr>
                            <th>Branch Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                        </tr>

                        @foreach ($customers as $single)
                            <tr>
                                <td>{{ $single->branch_id }}</td>
                                <td>{{ $single->first_name }}</td>
                                <td>{{ $single->last_name }}</td>
                                <td>{{ $single->email }}</td>
                                <td>{{ $single->phone }}</td>
                                <td>{{ $single->gender }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $customers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection