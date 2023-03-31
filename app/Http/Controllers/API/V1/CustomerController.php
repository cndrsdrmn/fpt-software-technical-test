<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Customer $customer): LengthAwarePaginator
    {
        return $customer->toPaginage($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        return $this->show($request->createCustomer(), [
            'message' => 'Customer created successfully.',
            'status' => JsonResponse::HTTP_CREATED,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, array $parameters = []): JsonResponse
    {
        return response()->json([
            'customer' => $customer,
            'message' => $parameters['message'] ?? 'Customer retrieved successfully.',
        ], $parameters['status'] ?? 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        $customer->forceFill($request->safe()->all())->save();

        return $this->show($customer->refresh(), [
            'message' => 'Customer updated successfully.',
            'status' => JsonResponse::HTTP_OK,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully.']);
    }
}
