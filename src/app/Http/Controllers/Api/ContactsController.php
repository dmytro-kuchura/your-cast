<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactsRequest;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;

class ContactsController extends Controller
{
    public ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * @OA\Post(
     *     path="/api/v1/contacts-form",
     *     summary="Contacts Form",
     *     tags={"Contacts Form"},
     *     @OA\RequestBody(
     *        required=true,
     *        description="Contacts Form data",
     *        @OA\JsonContent(
     *           @OA\Property(property="name", type="string", example="your name"),
     *           @OA\Property(property="email", type="email", example="example@domain.com"),
     *           @OA\Property(property="message", type="string", example="your message"),
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error"
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Error validation"
     *     )
     * )
     */
    public function contactsForm(ContactsRequest $request): JsonResponse
    {
        var_dump($request->session()->token());
        die;

//        dd(csrf_token());

        if ($this->contactService->validate($request->ip())) {
            return $this->returnResponse([
                'error' => 'Sorry you send contact request so many times. Try again later!'
            ], 422);
        }

        $request['ip'] = $request->ip();

        $this->contactService->createContact($request->all());

        return $this->returnResponse([
            'message' => 'Your message successfully sent!',
            'form' => 'contacts',
        ]);
    }
}
