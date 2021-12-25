<?php

namespace Source\App\Admin;

use Pecee\Controllers\IResourceController;
use Source\Core\Controller;
use Source\Models\Tag;
use Source\Request\TagRequest;

class TagController extends Controller implements IResourceController
{

    /**
     * @return mixed
     */
    public function index()
    {
        $tags = Tag::all();
        return $this->view->render("admin/tag/index",compact('tags'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->view->render("admin/tag/form");
    }

    /**
     * @return mixed
     */
    public function store()
    {
        $request = new TagRequest();
        if(!$request->validation()) redirect(url_back());
        Tag::create($request->all());
        redirect(url('tag.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return $this->view->render("admin/tag/form",compact('tag'));
    }

    /**
     * @param $id
     * @var Tag $tag
     * @return mixed
     */
    public function update($id)
    {
        $request = new TagRequest();
        if(!$request->validation()) redirect(url_back());
        $tag = Tag::find($id);
        $tag->update(["name" => $request->name]);
        redirect(url('tag.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag->destroy()) return response()->json(["status" => "error",'error' => 'Tag associada a um produto.'], 500);
        return response()->json(["status" => 'success']);
    }
}