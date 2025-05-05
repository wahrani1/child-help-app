@extends('layouts.app')

@section('title', 'Report a Child')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 300px;
            margin-bottom: 20px;
        }

        .emergency-btn {
            height: 100px;
            font-size: 1.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>Report a Child in Need</h1>
                <hr>
                <div class="alert alert-info">
                    <strong>Privacy Notice:</strong> This reporting process is completely anonymous. You don't need to provide any personal information.
                </div>
            </div>
        </div>

        <form action="{{ route('report.store') }}" method="POST" id="reportForm">
            @csrf
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Emergency Level</h5>
                            <div class="row">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="emergency_level" id="urgent" value="urgent" autocomplete="off" required>
                                    <label class="btn btn-outline-danger w-100 emergency-btn d-flex align-items-center justify-content-center" for="urgent">
                                        Urgent<br>(Immediate Danger)
                                    </label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="emergency_level" id="standard" value="standard" autocomplete="off" required>
                                    <label class="btn btn-outline-warning w-100 emergency-btn d-flex align-items-center justify-content-center" for="standard">
                                        Standard<br>(Needs Help)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Child Age Group (Optional)</h5>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="child_age_group" id="infant" value="infant" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="infant">Infant</label>

                                <input type="radio" class="btn-check" name="child_age_group" id="toddler" value="toddler" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="toddler">Toddler</label>

                                <input type="radio" class="btn-check" name="child_age_group" id="child" value="child" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="child">Child</label>

                                <input type="radio" class="btn-check" name="child_age_group" id="teenager" value="teenager" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="teenager">Teenager</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Location</h5>
                            <p>Please provide the location of the child:</p>

                            <div class="mb-3">
                                <button type="button" id="useGpsBtn" class="btn btn-primary mb-3">
                                    <i class="bi bi-geo-alt"></i> Use My GPS Location
                                </button>

                                <div id="map"></div>

                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">

                                <label for="location" class="form-label">Address or Description</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                       id="location" name="location" required
                                       placeholder="Street address or description of the location">
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Additional Details (Optional)</h5>
                            <div class="mb-3">
                                <label for="description" class="form-label">Situation Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          placeholder="Please describe the situation and any relevant details about the child or circumstances."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-danger btn-lg">Submit Report</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map
            var map = L.map('map').setView([0, 0], 2);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker;

            // Use GPS button
            document.getElementById('useGpsBtn').addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            var lat = position.coords.latitude;
                            var lng = position.coords.longitude;

                            // Update hidden inputs
                            document.getElementById('latitude').value = lat;
                            document.getElementById('longitude').value = lng;

                            // Update map
                            map.setView([lat, lng], 15);

                            // Add or update marker
                            if (marker) {
                                marker.setLatLng([lat, lng]);
                            } else {
                                marker = L.marker([lat, lng]).addTo(map);
                            }

                            // Try to get address from coordinates (reverse geocoding)
                            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.display_name) {
                                        document.getElementById('location').value = data.display_name;
                                    }
                                })
                                .catch(error => console.error('Error getting address:', error));
                        },
                        function(error) {
                            console.error('Geolocation error:', error);
                            alert('Unable to access your location. Please enter the location manually.');
                        }
                    );
                } else {
                    alert('Geolocation is not supported by your browser. Please enter the location manually.');
                }
            });

            // Click on map to set location
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                // Update hidden inputs
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                // Add or update marker
                if (marker) {
                    marker.setLatLng([lat, lng]);
                } else {
                    marker = L.marker([lat, lng]).addTo(map);
                }

                // Try to get address from coordinates (reverse geocoding)
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.display_name) {
                            document.getElementById('location').value = data.display_name;
                        }
                    })
                    .catch(error => console.error('Error getting address:', error));
            });
        });
    </script>
@endsection
