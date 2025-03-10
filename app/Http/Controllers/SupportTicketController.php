<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    public function index()
    {
        $support_tickets = SupportTicket::where('user_id', Auth::id())->get()->sortByDesc('created_at');
        return view('support-tickets.index', compact('support_tickets'));
    }

    public function create()
    {
        return view('support-tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([]);

        SupportTicket::create([
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'phone' => 'NOT APPLICABLE',
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'status' => SupportTicket::STATUSES[0],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tickets');
    }
}
