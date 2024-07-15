<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubscriberDataTable;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\NewsLetterRepositoryInterface;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    private $newsLetterRepository;
    public function __construct(NewsLetterRepositoryInterface $newsLetterRepository)
    {
        $this->newsLetterRepository = $newsLetterRepository;
    }
    public function index(SubscriberDataTable $dataTable)
    {
        return $this->newsLetterRepository->index($dataTable);
    }
    public function sendNewsLetter(Request $request)
    {
        return $this->newsLetterRepository->sendNewsLetter($request);
    }
    public function destroyEmail(string $id)
    {
        return $this->newsLetterRepository->destroyEmail($id);
    }
}
