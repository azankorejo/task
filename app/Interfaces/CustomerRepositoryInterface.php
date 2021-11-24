<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface {

    public function getAll();

    public function store($data);

}
