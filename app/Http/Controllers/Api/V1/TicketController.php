<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\{StoreTicketRequest, UpdateTicketRequest};
use App\Http\Resources\V1\TicketResource;
use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return TicketResource::collection(Ticket::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = null;

        DB::transaction(function () use ($request, &$ticket) {
            $customer = Customer::firstOrCreate([
                'email' => $request->email
            ], [
                'name' => $request->name
            ]);

            $ticket = $customer->tickets()->create([
                'subject' => $request->subject,
                'category' => $request->category,
                'language' => app()->getLocale()
            ]);

            $ticket->ticketMessages()->create([
                'sender_type' => 'customer',
                'body' => $request->message
            ]);
        });

        return response()->json('Ticket created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
