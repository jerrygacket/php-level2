<?php
class AdminController extends Controller
{
    
    protected $controls = [
        'pages' => 'Page',
        'orders' => 'Order',
        'categories' => 'Category',
        'goods' => 'Good'
    ];

    public $title = 'admin';
    
    public function index($data)
    {
        return ['controls' => $this->controls];
    }

    public function control($data)
    {
        // Сохранение
        $actionId = $this->getActionId($data);
        if ($actionId['action'] === 'save') {
            $fields = [];
            foreach ($_POST as $key => $value) {
                $field = explode('_', $key, 2);
                if ($field[0] == $actionId['id']) {
                    $fields[$field[1]] = $value;

                }
            }
        }

        if ($actionId['action'] === 'create') {
            $fields = [];
            foreach ($_POST as $key => $value) {
                if (substr($key, 0, 4) == 'new_') {
                    $fields[str_replace('new_', '', $key)] = $value;
                }
            }
        }

        switch($actionId['action']) {
            case 'create':
                $query = 'INSERT INTO ' . $data['id'] . ' ';
                $keys = [];
                $values = [];
                foreach ($fields as $key => $value) {
                    $keys[] = $key;
                    $values[] = '"' . $value . '"';
                }

                $query .= ' (' . implode(',', $keys) . ') VALUES ( ' . implode(',', $values) . ')';
                db::getInstance()->Query($query);
                break;
            case 'save':
                $query = 'UPDATE ' . $data['id'] . ' SET ';
                ;
                foreach ($fields as $field => $value) {
                    $query .= $field . ' = "' . $value . '",';
                }
                $query = substr($query, 0, -1) . ' WHERE id = :id';
                db::getInstance()->Query($query, ['id' => $actionId['id']]);
                break;
            case 'delete':
                db::getInstance()->Query('UPDATE ' . $data['id'] . ' SET status=:status WHERE id = :id', ['id' => $actionId['id'], 'status' => Status::Deleted]);
                break;
        }
        $fields = db::getInstance()->Select('desc ' . $data['id']);
        $_items = db::getInstance()->Select('select * from ' . $data['id']);
/* не понятно зачем это?
        $items = [];
        foreach ($_items as $item) {
            $items[] = new $this->controls[$data['id']]($item);
        }
*/
        return ['name' => $data['id'],'controls' => $this->controls, 'fields' => $fields, 'items' => $_items];
    }

    protected function getActionId($data)
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, '__save_') === 0) {
                $id = explode('__save_', $key)[1];
                $action = 'save';
            }
            elseif (strpos($key, '__delete_') === 0) {
                $id = explode('__delete_', $key)[1];
                $action = 'delete';
            }
            elseif (strpos($key, '__create') === 0) {
                $action = 'create';
                $id = 0;
            }
        }
        return ['id' => $id ?? -1, 'action' => $action ?? ''];
    }
}