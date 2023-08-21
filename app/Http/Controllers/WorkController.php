<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;

use App\Models\Work;
use App\Models\WorkImage;
use App\Models\WorkLink;
use App\Models\WorkTag;

use App\Models\Information;

class WorkController extends Controller
{

    protected $work;
    protected $workImage;
    protected $workLink;
    protected $workTag;
    protected $rules;
    protected $messages;
    protected $information;
    public function __construct()
    {
        $this->work = new Work;
        $this->workImage = new WorkImage;
        $this->workLink = new WorkLink;
        $this->workTag = new WorkTag;
        $this->rules = [];
        $this->messages = [];
        $this->information = new Information;
    }

    /**
     * 初期画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $self = new Work;

        $works = [
            'title' => $self['title'],
        ];
        return view('works.index', [
            'works' => $works
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
        return view('administrators/works/create');
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
        $this->rules=[];
        $this->messages=[];

        for ($i = 0; $i < count($request->link_url); $i++) {
            $this->rules["link_url.$i"] = 'required|string|max:254';
            $this->rules["link_name.$i"] = 'required|string|max:50';

            $this->messages["link_url.$i.required"] = "Link URL at index $i is required.";
            $this->messages["link_name.$i.required"] = "Link Name at index $i is required.";
        }

        for ($i = 0; $i < count($request->tag_name); $i++) {
            $this->rules["tag_name.$i"] = 'required|string|max:50';

            $this->messages["tag_name.$i.required"] = "Tag Name at index $i is required.";
        }

        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // works
        $request->validate([
            'title' => 'required|string|max:254',
            'explanation' => 'string',
            'comment' => 'nullable|string',
        ]);

        $data = [
            'title' => $request->title,
            'explanation' => $request->explanation,
            'comment' => $request->comment,
        ];
        // データベース登録
        $work = $this->work->insertWork($data);

        // work_images
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif',
            ]);

            // 画像のアップロード
            $this->workImage->common->uploadImageFile($request, 'works');
            $data = [
                'work_id' => $work->id,
                'image_name' => $this->workImage->common->getFileName(),
            ];
            // データベース登録
            $this->workImage->insertWorkImage($data);
        }

        // work_links
        for ($i = 0; $i < count($request->link_url); $i++) {
            $data = [
                'work_id' => $work->id,
                'link_url' => $request->link_url[$i],
                'link_name' => $request->link_name[$i],
            ];
            // データベース登録
            $this->workLink->insertWorkLink($data);
        }

        // work_tags
        for ($i = 0; $i < count($request->tag_name); $i++) {
            $data = [
            'work_id' => $work->id,
            'tag_name' => $request->tag_name[$i],
            ];
            // データベース登録
            $this->workTag->insertWorkTag($data);
        }

        return redirect()->route('work.create');
    }
}
