<?php

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface {

  public function getAll() {
    return Customer::latest()->get();
  }

  public function store($data) {
    return Customer::create([
      'name' => $data['name'],
      'date_of_birth' => $data['date_of_birth'],
    ]);
  }

}
