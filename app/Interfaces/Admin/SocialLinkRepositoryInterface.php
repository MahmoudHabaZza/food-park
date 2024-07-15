<?php
namespace App\Interfaces\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Requests\SocialLinkCreateRequest;

interface SocialLinkRepositoryInterface {
    public function index(SocialLinkDataTable $dataTable);
    public function create();
    public function store(SocialLinkCreateRequest $request);
    public function edit(string $id);
    public function update(SocialLinkCreateRequest $request,string $id);
    public function destroy(string $id);
}
