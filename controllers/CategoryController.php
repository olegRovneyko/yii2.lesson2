<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 08.05.2016
 * Time: 10:00
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use Yii;

class CategoryController extends AppController
{

    public function actionIndex()
    {
        $this->setMeta('e-shopper');
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');
        //$products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->limit($pages->limit)->offset($pages->offset)->all();

        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | поиск по: ' . $q);
        if (!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->limit($pages->limit)->offset($pages->offset)->all();

        return $this->render('search', compact('products', 'pages', 'q'));
    }

} 