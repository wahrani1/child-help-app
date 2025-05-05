@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Help Children in Need</h1>
                    <p class="lead">Our platform enables quick reporting of children in emergency situations, connecting them with nearby foster homes and rescue teams immediately.</p>
                    <a href="{{ route('report.create') }}" class="btn btn-danger btn-lg report-btn mt-3">Report a Child in Need</a>
                </div>
                <div class="col-md-6">
                    <img src="https://placehold.co/600x400" class="img-fluid rounded" alt="Child Help Hero Image">
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>How It Works</h2>
                <p>Three simple steps to help a child in need</p>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h1 class="display-3 text-primary">1</h1>
                        <h5 class="card-title">Report</h5>
                        <p class="card-text">Click the "Report a Child" button and share the location of the child in need.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h1 class="display-3 text-primary">2</h1>
                        <h5 class="card-title">Connect</h5>
                        <p class="card-text">We instantly notify nearby foster homes and rescue teams about the situation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h1 class="display-3 text-primary">3</h1>
                        <h5 class="card-title">Confirm</h5>
                        <p class="card-text">Receive confirmation when the child has been safely transferred to care.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="privacy-note mt-5">
            <h4>Your Privacy Matters</h4>
            <p>Our system is designed to protect your privacy. No personal information is required from informants, making it safe and easy to use.</p>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Making a Difference</h2>
                    <p>Every report helps a child find safety and care. Your action can make a life-changing difference for a child in need.</p>
                    <p>Our network connects with local foster homes, child services, and emergency responders to ensure quick and appropriate action.</p>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Impact Statistics</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Children Helped
                                    <span class="badge bg-primary rounded-pill">1,240+</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Partner Foster Homes
                                    <span class="badge bg-primary rounded-pill">85</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Average Response Time
                                    <span class="badge bg-primary rounded-pill">12 min</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
