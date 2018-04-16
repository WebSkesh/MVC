<?php
# задача будь якого контролера
# це сформувати дані з моделі
# які потім будуть передані у представлення

namespace App;

class PagesController extends Controller
{

    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Pages();
    }

    # стандартний метод, виклик списка сторінок
    public function index () {

        $this->data['pages'] = $this->model->getList();
        $this->data['test'] = 'bla bla bla';

        #arr_echo($this->model->getList());
    }

    # виклик однієї сторінки
    public function view() {

        $params = AppController::getRouter()->getParams();

        if (isset($params[0])) {
            $alias = strtolower($params[0]);
            $this->data['page'] = $this->model->getByAlias($alias);
        }
    }

}