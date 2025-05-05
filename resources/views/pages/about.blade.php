@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>About Child Help</h1>
                <hr>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Our Mission</h3>
                <p>At Child Help, our mission is to create a safer world for children by providing immediate assistance
                    to those in emergency situations or in need of care.</p>
                <p>We believe that every child deserves safety, protection, and love. Our platform serves as a bridge
                    between vulnerable children and those who can help them.</p>

                <h3 class="mt-4">Our Vision</h3>
                <p>We envision a world where no child is left without care during emergencies, and where communities are
                    empowered to protect their most vulnerable members.</p>

                <h3 class="mt-4">Our Values</h3>
                <ul>
                    <li><strong>Child Safety First:</strong> The wellbeing of children is our top priority in everything
                        we do.
                    </li>
                    <li><strong>Privacy:</strong> We respect the privacy of everyone involved in the reporting process.
                    </li>
                    <li><strong>Immediacy:</strong> We understand that in emergencies, every minute counts.</li>
                    <li><strong>Compassion:</strong> We approach every situation with empathy and understanding.</li>
                    <li><strong>Collaboration:</strong> We work with foster homes, rescue teams, and official agencies
                        to create the best outcomes.
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="https://placehold.co/600x400" class="img-fluid rounded mb-4" alt="About Child Help">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">How Child Help Started</h5>
                        <p>Child Help was founded in 2022 by a group of child welfare professionals and tech specialists
                            who saw the need for a faster, more efficient way to connect children in need with immediate
                            help.</p>
                        <p>After witnessing delays in traditional reporting systems, our founders created this platform
                            to provide an immediate response mechanism that protects both the child and the
                            reporter.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3>Our Network</h3>
                <p>We partner with:</p>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Foster Homes</h5>
                                <p class="card-text">Licensed foster homes ready to provide temporary care for children
                                    in emergency situations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Rescue Teams</h5>
                                <p class="card-text">Trained professionals who can quickly respond to situations
                                    requiring immediate intervention.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Child Services</h5>
                                <p class="card-text">Official child protective services who work with us to ensure
                                    proper follow-up and long-term care.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="privacy-note mt-5">
            <h4>Our Privacy Commitment</h4>
            <p>We understand that people may hesitate to report children in need out of privacy concerns. That's why our
                system is designed to be completely anonymous if desired. You can report a child in need without
                providing any personal information.</p>
        </div>
    </div>
@endsection
