@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome, Admin!</h5>
                        <p class="card-text">Here you can manage the events and users.</p>
                        <p class="card-text">Beheer je evenementen, gebruikers en reserveringen.</p>
                        <img src="{{ asset('img/daschboardAdmin.png') }}" class="card-img-top" alt="Dashboard Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
