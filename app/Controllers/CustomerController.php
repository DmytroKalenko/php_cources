<?php
declare(strict_types=1);
namespace Controllers;

use Core\Controller;
use Core\View;


class CustomerController extends Controller
{


    public function listAction(): void
    {
        $this->set('title', "Клієнти");

        $customers = $this->getModel('Customer')
           ->initCollection()
//            ->sort($this->getSortParams())
           ->getCollection()
          ->select();
        $this->set('customers', $customers);

        $this->renderLayout();
    }

    public function viewAction(): void
    {
        $this->set('title', 'Карточка клієнта');

        $customers = $this->getModel('Customer');
        $customers->initCollection()
            ->filter(['id', $this->getId()])
            ->getCollection()
           ->selectFirst();
        $this->set('customers', $customers);

        $this->renderLayout();



    }

    public function editAction(): void
    {
        $model = $this->getModel('Customer');
        $this->set('saved', 0);
        $this->set("title", "Редагування даних");
        $id = filter_input(INPUT_POST, 'id');
        if ($id) {
            $values = $model->getPostValues();
            $this->set('saved', 1);
            $model->saveItem($id, $values);
        }
        $this->set('customer', $model->getItem($this->getId()));

        $this->renderLayout();
    }

    public function addAction(): void
    {
        $model = $this->getModel('Customer');
        $this->set("title", "Додавання клієнта");
        if ($values = $model->getPostValues()) {
            $model->addItem($values);
        }
        $this->renderLayout();
    }

    public function getSortParams(): array
    {
        $params = [];
        $sortfirst = filter_input(INPUT_POST, 'sortfirst');
        if ($sortfirst === "name_DESC") {
            $params['name'] = 'DESC';
        } else {
            $params['name'] = 'ASC';
        }
        return $params;
    }

    public function getId()
    {
        return filter_input(INPUT_GET, 'id');
    }
}