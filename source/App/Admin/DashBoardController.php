<?php


namespace Source\App\Admin;

use Source\Model\Auth;
use Source\Core\Controller;
use Source\Models\Tag;


class DashBoardController extends Controller
{
    public function index(): string
    {
        return $this->view->render("admin/dashboard");
    }

    public function ajax()
    {
        $tag = new Tag();
        if (input()->value('type') !== null && input()->value('type') == 'pie') {
            $pie = $tag->tagsMoreUsedForProductInPercentage();
            return json_encode($pie);
        }

        if (input()->value('type') !== null && input()->value('type') == 'bar') {
            $bar = $tag->tagsMoreUsedForProductInNumberedList();
            return json_encode($bar);
        }

    }
}
