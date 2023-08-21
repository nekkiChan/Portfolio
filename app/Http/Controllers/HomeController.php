<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Home;
use App\Models\Profile;
use App\Models\Work;
use App\Models\Information;
use App\Models\InformationImage;
use App\Models\InformationTag;

class HomeController extends Controller
{
    protected $home;
    protected $information;
    protected $informationImage;
    protected $informationTag;
    protected $profile;
    protected $work;

    public function __construct()
    {
        $this->home = new Home;
        $this->information = new Information;
        $this->informationImage = new InformationImage;
        $this->informationTag = new InformationTag;
        $this->profile = new Profile;
        $this->work = new Work;
    }

    /**
     * 初期画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $info = [
            'id' => $this->information->find(1)->getKey(),
            'title' => $this->information->find(1)->title,
            'image' => $this->informationImage->searchImage(60),
            'created_at' => $this->information->common->formatDateTime($this->information->find(1)->created_at),
        ];

        $data = [
            'short_text' => $this->profile->getData()['short_text'],
            'information' => $info,
            // 'work' => $this->work->find(1)->title,
            'work' => 'Twitterクローン'
        ];
        return view('home.index', [
            'data' => $data
        ]);
    }
}
