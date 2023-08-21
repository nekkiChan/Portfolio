<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;

use App\Models\Information;
use App\Models\InformationImage;
use App\Models\InformationTag;

class InformationController extends Controller
{
    protected $information;
    protected $informationImage;
    protected $informationTag;
    protected $rules;
    protected $messages;
    public function __construct()
    {
        $this->information = new Information;
        $this->informationImage = new InformationImage;
        $this->informationTag = new InformationTag;
        $this->rules = [];
        $this->messages = [];
    }

    /**
     * 一覧画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $information = Information::find(1);

        $data = [
            'id' => $information->getKey(),
            'title' => $information->find(1)->title,
            'created_at' => $information->find(1)->created_at,
        ];
        return view('informations.index', [
            'data' => $data,
        ]);
    }

    /**
     * 詳細画面
     *
     * @param Request $request
     * @return View
     */
    public function viewMore(Request $request)
    {
        return view('data');
    }

    /**
     * 管理者用お知らせ投稿画面
     *
     * @param Request $request
     * @return View
     */
    public function create(Request $request)
    {
        return view('administrators/informations/create');
    }

    /**
     * 投稿更新
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // バリデーション
        $this->rules = [];
        $this->messages = [];

        for ($i = 0; $i < count($request->tag_name); $i++) {
            $this->rules["tag_name.$i"] = 'required|string|max:50';

            $this->messages["tag_name.$i.required"] = "Tag Name at index $i is required.";
        }

        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // informations
        $request->validate([
            'title' => 'required|string|max:254',
            'explanation' => 'string',
            'work_id' => 'integer|nullable',
        ]);
        $data = [
            'title' => $request->title,
            'explanation' => $request->explanation,
            'work_id' => $request->work_id,
        ];
        // データベース登録
        $information = $this->information->insertInformation($data);

        // information_images
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            // 画像のアップロード
            $this->informationImage->common->uploadImageFile($request, 'informations');
            $data = [
                'information_id' => $information->id,
                'image_name' => $this->informationImage->common->getFileName(),
            ];
            // データベース登録
            $this->informationImage->insertInformationImage($data);
        }

        // information_tags
        for ($i = 0; $i < count($request->tag_name); $i++) {
            $data = [
                'information_id' => $information->id,
                'tag_name' => $request->tag_name[$i],
            ];
            // データベース登録
            $this->informationTag->insertWorkTag($data);
        }

        return redirect()->route('information.create');
    }

}
