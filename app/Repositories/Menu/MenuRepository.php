<?php

namespace App\Repositories\Menu;

use App\Repositories\BaseRepository;
use App\Repositories\Menu\MenuInterface;
use App\Model\Page;
use App\Model\Tax;
use App\Model\Service;
use App\Repositories\Page\PageRepository;
use App\Repositories\Tax\TaxRepository;
use App\Repositories\Services\ServicesRepository;
use Request;

class MenuRepository extends BaseRepository implements MenuInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules() {
        $rules = [];
//        foreach (get_langs() as $lang) {
//            $rules[$lang->code . '.name'] = 'required';
//        }
        return $rules;
    }

    public function all($group_id, $lang = null, $args = null) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'order';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];

        return $this->model->where('status', 1)->where('group_id', $group_id)->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                        $q->select('id', 'code');
                    }])->orderBy($orderby, $order)->get($columns);
    }

    public function listAll($except_id = 0, $lang, $has_name = false) {
        $items = $this->model->where('id', '!=', $except_id)->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                    }])->get(['id']);
        if ($has_name) {
            $result = [];
            foreach ($items as $item) {
                $result[$item->id] = $item->langs->first()->pivot->name;
            }
            return $result;
        }
        return $this->model->where('id', '!=', $except_id)->lists('id')->toArray();
    }

    public function create($request) {
//        if ($this->valid($request->all(), $this->rules())) {
        $menu = new $this->model;
        $menu->status = $request->get('status');
        $menu->group_id = $request->get('group_id');
        if ($request->has('parent')) {
            $menu->parent = $request->get('parent');
        }
        $menu->icon = $request->get('icon');
        $menu->type = $request->get('type');
        $menu->type_id = $request->get('type_id');

        $menu->save();

        if ($request->get('type') == 'custom') {
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $menu_desc = [
                    'name' => $datalang['name'],
                    'link' => $datalang['link']
                ];
                $menu->langs()->attach($lang->id, $menu_desc);
            }
        } else {
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $type_id = $request->get('type_id');
                switch ($request->get('type')) {
                    case 'page':
                        $pagerepo = new PageRepository(new Page);
                        $page = $pagerepo->get_with_lang($type_id, $lang->code);
                        $link = get_path(route('page.show', ['id' => $type_id, 'slug' => $page->lang->slug]));
                        $name = (trim($datalang['name']) == '') ? $page->lang->name : $datalang['name'];
                        break;
                    case 'cat':
                        $catrepo = new TaxRepository(new Tax);
                        $cat = $catrepo->get_with_lang($type_id, $lang->code);
                        $link = get_path(route('cat.show', ['id' => $type_id, 'slug' => $cat->lang->slug]));
                        $name = (trim($datalang['name']) == '') ? $cat->lang->name : $datalang['name'];
                        break;
                    case 'services':
                        $services = new ServicesRepository(new Service);
                        $ser = $services->get_with_lang($type_id, $lang->code);
                        $link = get_path(route('services.show', ['id' => $type_id, 'slug' => $ser->lang->slug]));
                        $name = (trim($datalang['name']) == '') ? $ser->lang->name : $datalang['name'];
                        break;
                    default:
                        $link = '';
                        $name = '';
                        break;
                }
                $menu_desc = [
                    'name' => $name,
                    'link' => $link
                ];
                $menu->langs()->attach($lang->id, $menu_desc);
            }
        }
//        } else {
//            throw new ValidateException($this->getError());
//        }
    }

    public function update($id, $request) {
        $menu = $this->find($id);
        $menu->status = $request->get('status');
        if ($request->has('parent')) {
            $menu->parent = $request->get('parent');
        }
        $menu->icon = $request->get('icon');
        $menu->type = $request->get('type');
        $menu->type_id = $request->get('type_id');

        $menu->update();
        $syncs = [];
        if ($request->get('type') == 'custom') {
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $menu_desc = [
                    'name' => $datalang['name'],
                    'link' => $datalang['link']
                ];
                $syncs[$lang->id] = $menu_desc;
            }
        } else {
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $type_id = $request->get('type_id');
                switch ($request->get('type')) {
                    case 'page':
                        $pagerepo = new PageRepository(new Page);
                        $page = $pagerepo->get_with_lang($type_id, $lang->code);
                        $link = get_path(route('page.show', ['id' => $type_id, 'slug' => $page->lang->slug]));
                        $name = (trim($datalang['name']) == '') ? $page->lang->name : $datalang['name'];
                        break;
                    case 'cat':
                        $catrepo = new TaxRepository(new Tax);
                        $cat = $catrepo->get_with_lang($type_id, $lang->code);
                        ;
                        $link = get_path(route('cat.show', ['id' => $type_id, 'slug' => $cat->lang->slug]));
                        $name = (trim($datalang['name']) == '') ? $cat->lang->name : $datalang['name'];
                        break;
                    case 'services':
                        $services = new ServicesRepository(new Service);
                        $ser = $services->get_with_lang($type_id, $lang->code);
                        $link = get_path(route('services.show', ['id' => $type_id, 'slug' => $ser->lang->slug]));
                        $name = (trim($datalang['name']) == '') ? $ser->lang->name : $datalang['name'];
                        break;
                    default:
                        $link = '';
                        $name = '';
                        break;
                }
                $menu_desc = [
                    'name' => $name,
                    'link' => $link
                ];
                $syncs[$lang->id] = $menu_desc;
            }
        }
        $menu->langs()->sync($syncs);
    }

    public function delete($id) {
        $menu = $this->find($id);
        $menu->langs()->detach();
        $this->model->where('parent', $id)->update(['parent' => 0]);
        $menu->delete();
    }

    public function massdel($request) {
        
    }
    
    public function updateOrder($orders, $parent=0) {
        foreach ($orders as $key => $item) {
            $menu = $this->model->find($item['id']);
            $menu->order = $key + 1;
            $menu->parent = $parent;
            $menu->update();
            if (isset($item['children'])) {
                $this->updateOrder($item['children'], $item['id']);
            }
        }
    }
    
    public function has_child($id){
        if($this->model->where('parent', $id)->count()>0){
            return true;
        }
        return false;
    }

    public function editBackendMenu($lists, $parent = 0) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $ilang = $item->langs->first()->pivot;
                $output .= '<li data-id="' . $item->id . '" class="dd-item dd3-item">';
                $output.= '<div class="dd-handle dd3-handle"></div>';
                $output.= '<div class="dd3-content">'
                        . '<span class="title">' . $ilang->name . '</span>'
                        . '<span class="actions">'
                        . '<a href="' . route('admin.menu.edit', $item->id) . '" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>'
                        . '<a href="' . route('admin.menu.delete', $item->id) . '" class="btn btn-danger btn-sm item-delete"><i class="fa fa-close"></i></a>'
                        . '</span>'
                        . '</div>';
                unset($lists[$key]);
                $output2 = $this->editBackendMenu($lists, $item->id);
                if ($output2 != '') {
                    $output .= '<ol class="childs dd-list">' . $output2 . '</ol>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

    public function generateMenus($lists, $parent = 0){
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $ilang = $item->langs->first()->pivot;
                $link = ($item->type == 'custom') ? $ilang->link : url($ilang->link);
                $taget = ($item->open_type == 'newtab') ? '_blank' : '';
                $active = ($link == Request::url()) ? 'active' : '';
                if($this->has_child($item->id)){
                    $output .= '<li data-id="' . $item->id . '" class="dropdown ' . $active . '">';
                    $output.= '<a href="'.$ilang->link.'" target="'.$item->open_type.'" class="dropdown-toggle" data-toggle="dropdown">'.$ilang->name.' <span class="fa fa-angle-down"></span></a>';
                    unset($lists[$key]);
                    $output2 = $this->generateMenus($lists, $item->id);
                    $output .= '<ul class="childs dropdown-menu">' . $output2 . '</ul>';
                }else{
                    $output.= '<li data-id="'.$item->id.'" class="' . $active . '"><a href="'.$ilang->link.'" target="'.$item->open_type.'">'.$ilang->name.'</a></li>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

}
