<?php

namespace App\Services;

use App\Exceptions\AudioFileCreatingException;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Throwable;

class ContactService
{
    /** @var ContactRepository */
    private ContactRepository $repository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->repository = $contactRepository;
    }

    public function validate(string $ip): bool
    {
        $contact = $this->repository->findByIp($ip);

        if (isset($contact->created_at)) {
            if (Carbon::parse($contact->created_at)->diffInMinutes(Carbon::now()) > 5) {
                return false;
            }
        }

        return true;
    }

    public function createContact(array $data): Contact
    {
        DB::beginTransaction();

        try {
            $contact = $this->repository->store($data);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new AudioFileCreatingException($exception->getMessage());
        }

        DB::commit();

        return $contact;
    }
}
