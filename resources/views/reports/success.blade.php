@extends('layouts.app')

@section('title', 'Report Submitted')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-success mb-4">
                    <h2><i class="bi bi-check-circle"></i> Report Successfully Submitted</h2>
                    <p class="lead">Thank you for helping a child in need.</p>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Report ID</h5>
                        <p class="display-6">{{ $reportId }}</p>
                        <p class="text-muted">You can use this ID to track the status of your report if you wish.</p>
                    </div>
                </div>

                <h3 class="mb-3">Nearby Foster Homes & Rescue Teams</h3>
                <div class="row" id="nearbyCenters">
                    <div class="col-12">
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p>Finding nearby centers...</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <p>Relevant authorities have been notified and will respond as quickly as possible.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Return Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch nearby centers
            fetch('{{ route("report.centers") }}')
                .then(response => response.json())
                .then(data => {
                    const centersContainer = document.getElementById('nearbycenters');
                    let html = '';

                    if (data.centers && data.centers.length > 0) {
                        html = '<div class="row">';
                        data.centers.forEach(center => {
                            html += `
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">${center.name}</h5>
                                        <p class="card-text mb-1"><strong>Distance:</strong> ${center.distance}</p>
                                        <p class="card-text mb-1"><strong>Address:</strong> ${center.address}</p>
                                        <p class="card-text mb-1"><strong>Phone:</strong> ${center.phone}</p>
                                        <p class="card-text"><strong>Status:</strong>
                                            <span class="badge bg-success">${center.availability}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        html += '</div>';
                    } else {
                        html = '<div class="alert alert-warning">No nearby centers found. Authorities have been notified.</div>';
                    }

                    document.getElementById('nearbycenters').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('nearbycenters').innerHTML =
                        '<div class="alert alert-danger">Error loading nearby centers. Authorities have been notified.</div>';
                });
        });
    </script>
@endsection
