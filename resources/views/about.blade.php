@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-primary-600 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">About Us</h1>
                <p class="text-xl text-primary-100">Making a difference in the world, one campaign at a time.</p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
                    <p class="text-gray-600 text-lg">
                        We are dedicated to creating positive change in communities around the world through 
                        transparent and effective fundraising campaigns. Our platform connects donors with 
                        meaningful causes, ensuring that every contribution makes a real impact.
                    </p>
                </div>

                <!-- Values Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Transparency</h3>
                        <p class="text-gray-600">We believe in complete transparency in all our operations and fund allocation.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Community</h3>
                        <p class="text-gray-600">Building strong communities through collective action and support.</p>
                    </div>

                    <div class="text-center">
                        <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Impact</h3>
                        <p class="text-gray-600">Creating measurable and sustainable impact in the communities we serve.</p>
                    </div>
                </div>

                <!-- Team Section -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Our Team</h2>
                    <p class="text-gray-600 text-lg mb-8">
                        Meet the dedicated individuals behind our organization, working tirelessly to make a difference.
                    </p>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                 alt="Team Member" 
                                 class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h3 class="text-xl font-semibold mb-1">John Doe</h3>
                            <p class="text-gray-600">Founder & CEO</p>
                        </div>
                        <div class="text-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                 alt="Team Member" 
                                 class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h3 class="text-xl font-semibold mb-1">Jane Smith</h3>
                            <p class="text-gray-600">Operations Director</p>
                        </div>
                        <div class="text-center">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                 alt="Team Member" 
                                 class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h3 class="text-xl font-semibold mb-1">Mike Johnson</h3>
                            <p class="text-gray-600">Community Manager</p>
                        </div>
                    </div>
                </div>

                <!-- Impact Stats -->
                <div class="bg-primary-50 rounded-lg p-8 mb-12">
                    <div class="grid md:grid-cols-4 gap-8 text-center">
                        <div>
                            <div class="text-4xl font-bold text-primary-600 mb-2">50+</div>
                            <p class="text-gray-600">Active Campaigns</p>
                        </div>
                        <div>
                            <div class="text-4xl font-bold text-primary-600 mb-2">$1M+</div>
                            <p class="text-gray-600">Raised</p>
                        </div>
                        <div>
                            <div class="text-4xl font-bold text-primary-600 mb-2">10K+</div>
                            <p class="text-gray-600">Donors</p>
                        </div>
                        <div>
                            <div class="text-4xl font-bold text-primary-600 mb-2">20+</div>
                            <p class="text-gray-600">Countries</p>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold mb-4">Join Our Mission</h2>
                    <p class="text-gray-600 text-lg mb-8">
                        Be part of our journey to create positive change in the world.
                    </p>
                    <div class="flex justify-center gap-4">
                        <a href="#" class="btn btn-primary">Start a Campaign</a>
                        <a href="#" class="btn btn-secondary">Become a Donor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 