<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 28.09.2017
 * Time: 9:11
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController
{
    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product))
            throw new \yii\web\HttpException(404, 'Такого товара нет');
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->orderBy(['id' => SORT_DESC])->all();

        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hits'));
    }
}