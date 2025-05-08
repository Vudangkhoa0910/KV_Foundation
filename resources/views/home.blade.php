@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-blue-600 text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                 alt="Hero Background" 
                 class="w-full h-full object-cover opacity-20">
        </div>
        <div class="relative container mx-auto px-4 py-32">
            <div class="max-w-3xl">
                <h1 class="text-5xl font-bold mb-6">Make a Difference Today</h1>
                <p class="text-xl mb-8">Join us in our mission to create positive change through charitable giving and community support.</p>
                <div class="flex space-x-4">
                    <a href="/campaigns" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                        Explore Campaigns
                    </a>
                    <a href="/donate" class="border-2 border-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                        Donate Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Stats -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl font-bold text-blue-600 mb-2">$2.5M+</div>
                    <div class="text-gray-600">Total Donations</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                    <div class="text-gray-600">Active Campaigns</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-blue-600 mb-2">10K+</div>
                    <div class="text-gray-600">Donors</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-blue-600 mb-2">100+</div>
                    <div class="text-gray-600">Communities Helped</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Campaigns -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Featured Campaigns</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Campaign Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Education Campaign" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Education for All</h3>
                        <p class="text-gray-600 mb-4">Support underprivileged children's education and provide them with necessary resources.</p>
                        <div class="mb-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-2">
                                <span>$75,000 raised</span>
                                <span>75%</span>
                            </div>
                        </div>
                        <a href="/campaigns/education" class="text-blue-600 font-semibold hover:text-blue-700">Learn More →</a>
                    </div>
                </div>

                <!-- Campaign Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Healthcare Campaign" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Healthcare Access</h3>
                        <p class="text-gray-600 mb-4">Provide essential healthcare services to communities in need.</p>
                        <div class="mb-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 60%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-2">
                                <span>$60,000 raised</span>
                                <span>60%</span>
                            </div>
                        </div>
                        <a href="/campaigns/healthcare" class="text-blue-600 font-semibold hover:text-blue-700">Learn More →</a>
                    </div>
                </div>

                <!-- Campaign Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1593113630400-ea4288922497?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Disaster Relief" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Disaster Relief</h3>
                        <p class="text-gray-600 mb-4">Emergency support for communities affected by natural disasters.</p>
                        <div class="mb-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 90%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600 mt-2">
                                <span>$90,000 raised</span>
                                <span>90%</span>
                            </div>
                        </div>
                        <a href="/campaigns/disaster-relief" class="text-blue-600 font-semibold hover:text-blue-700">Learn More →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Choose a Cause</h3>
                    <p class="text-gray-600">Browse through our verified campaigns and select the one that resonates with you.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Make a Donation</h3>
                    <p class="text-gray-600">Contribute any amount you're comfortable with through our secure payment system.</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Track Impact</h3>
                    <p class="text-gray-600">Follow the progress of your chosen campaign and see the real impact of your donation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Make a Difference?</h2>
            <p class="text-xl mb-8">Join thousands of donors who are already making an impact in communities worldwide.</p>
            <a href="/register" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Start Donating Today
            </a>
        </div>
    </section>
@endsection 