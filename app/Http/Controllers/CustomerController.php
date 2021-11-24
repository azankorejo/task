<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CustomerRepositoryInterface;
use App\Http\Requests\CustomerStoreRequest;

class CustomerController extends Controller
{

    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
      $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->getAll();
        return view('customers', compact('customers'));
    }

    public function store(CustomerStoreRequest $request)
    {
      $this->customerRepository->store($request->validated());
      return redirect()->back()->with(['success' => 'Customer Added Successfully']);
    }
}
