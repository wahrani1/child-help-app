@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>Contact Us</h1>
                <hr>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Get in Touch</h3>
                <p>We're here to answer any questions you have about Child Help. Please fill out the form, and we'll get back to you as soon as possible.</p>

                <form action="{{ route('contact.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name (Optional)</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">If you'd like us to reply to you, please provide your email.</div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="privacy-note mb-3">
                        <p class="mb-0">In line with our privacy policy, you can submit this form anonymously without providing your name or email if you prefer.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Emergency Contact</h5>
                        <p>If you're currently witnessing a child in an emergency situation, please use the "Report a Child" button or call emergency services immediately.</p>
                        <a href="{{ route('report.create') }}" class="btn btn-danger">Report a Child</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">General Information</h5>
                        <p class="mb-2"><strong>Email:</strong> info@childhelp.org</p>
                        <p class="mb-2"><strong>Hotline:</strong> 1-800-4-A-CHILD</p>
                        <p class="mb-2"><strong>Hours:</strong> Our platform operates 24/7</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Partner With Us</h5>
                        <p>If you represent a foster home, rescue team, or child welfare organization and would like to join our network, please contact us at partners@childhelp.org.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3>Frequently Asked Questions</h3>
                <div class="accordion mt-3" id="contactFaq">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Is my report really anonymous?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                Yes. Our system is designed to protect your privacy. You don't need to provide any personal information when reporting a child in need. We generate a unique report ID for tracking purposes only.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                What happens after I report a child?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                After you submit a report, our system immediately notifies the nearest foster homes and rescue teams. You'll receive information about these nearby centers and get confirmation when the child has been safely transferred to care.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Does this replace calling emergency services?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                For life-threatening emergencies, always call emergency services (911) first. Our platform works alongside official services to provide additional support, especially for children who need immediate shelter rather than medical attention.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
