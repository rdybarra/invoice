<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use Illuminate\Support\Facades\Input;

class ClientController extends Controller
{
    public function index(Request $request) {
        $clients = Client::orderBy('created_at', 'asc')->get();

        return view('clients/index', [
            'clients' => $clients
        ]);
    }

    public function show(Request $request, $id) {
        $client = Client::find($id);

        return view('clients/show', [
            'client' => $client,
            'invoices' => $client->invoices
        ]);
    }

    public function edit(Request $request, $id) {
        $client = Client::find($id);

        return view('clients/edit', [
            'client' => $client
        ]);
    }

    public function create(Request $request) {
        $client = new Client();

        return view('clients/create', [
            'client' => $client
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $client = new Client(Input::all());
        $client->save();

        $request->session()->flash('success', 'Your new client has been added!');
        return redirect('/clients');
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $client = Client::find($id);

        $client->update(Input::all());

        $request->session()->flash('success', 'Your client has been updated!');
        return redirect('/clients/' . $client->id);
    }

    public function destroy(Request $request, $id) {
        $client = Client::find($id);
        $client->delete();

        $request->session()->flash('success', 'Client &ldquo;' . $client->name . '&rdquo; is gone!');
        return redirect('/clients');
    }
}
