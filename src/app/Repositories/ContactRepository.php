<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository implements Repository
{
    public function get(int $id): ?Contact
    {
        return Contact::where('id', $id)->first();
    }

    public function findByIp(string $ip): ?Contact
    {
        return Contact::where('ip', $ip)->orderBy('created_at', 'desc')->first();
    }

    public function all(): array
    {
        return Contact::all();
    }

    public function store(array $data): Contact
    {
        $contact = new Contact;

        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->message = $data['message'];
        $contact->ip = $data['ip'];

        $contact->save();

        return $contact;
    }

    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy(int $id)
    {
        // TODO: Implement destroy() method.
    }
}
