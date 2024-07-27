<?php
namespace App\Interfaces\EndUser;

interface WithListRepositoryInterface {
    public function store(string $productId);
    public function destroy(string $id);
}
