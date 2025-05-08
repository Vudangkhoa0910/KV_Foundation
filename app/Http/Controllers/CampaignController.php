<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Show the form for creating a new campaign
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created campaign
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'goal_amount' => 'required|numeric|min:1',
            'end_date' => 'required|date|after:today',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('campaigns', 'public');

        $campaign = Campaign::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'goal_amount' => $validated['goal_amount'],
            'end_date' => $validated['end_date'],
            'image' => $imagePath,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('campaign.detail', $campaign)
            ->with('success', 'Campaign created successfully!');
    }

    /**
     * Show the form for editing a campaign
     */
    public function edit(Campaign $campaign)
    {
        $this->authorize('update', $campaign);
        return view('campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified campaign
     */
    public function update(Request $request, Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'goal_amount' => 'required|numeric|min:1',
            'end_date' => 'required|date|after:today',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaigns', 'public');
            $validated['image'] = $imagePath;
        }

        $campaign->update($validated);

        return redirect()->route('campaign.detail', $campaign)
            ->with('success', 'Campaign updated successfully!');
    }

    /**
     * Remove the specified campaign
     */
    public function destroy(Campaign $campaign)
    {
        $this->authorize('delete', $campaign);
        
        $campaign->delete();

        return redirect()->route('campaigns')
            ->with('success', 'Campaign deleted successfully!');
    }

    /**
     * Process a donation for a campaign
     */
    public function donate(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:credit_card,bank_transfer'
        ]);

        // Process payment logic here
        // This is where you would integrate with a payment gateway

        $campaign->donations()->create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method']
        ]);

        return redirect()->route('campaign.detail', $campaign)
            ->with('success', 'Thank you for your donation!');
    }

    /**
     * Show user's donation history
     */
    public function donations()
    {
        $donations = Auth::user()->donations()->with('campaign')->latest()->paginate(10);
        return view('donations.index', compact('donations'));
    }
} 