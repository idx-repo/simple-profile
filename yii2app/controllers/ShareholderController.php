<?php

namespace app\controllers;

use Yii;
use app\models\Shareholder;
use app\models\Company;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShareholderController mengelola data pemegang saham perusahaan.
 */
class ShareholderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Menambahkan pemegang saham untuk perusahaan.
     * @param int $comp_id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($comp_id)
    {
        $company = Company::findOne($comp_id);
        if (!$company) {
            throw new NotFoundHttpException('Perusahaan tidak ditemukan.');
        }

        $model = new Shareholder();
        $model->comp_id = $comp_id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Pemegang saham berhasil ditambahkan.');
                return $this->redirect(['company/view', 'id' => $model->comp_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'company' => $company,
        ]);
    }

    /**
     * Memperbarui data pemegang saham.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Shareholder::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Data pemegang saham tidak ditemukan.');
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Data pemegang saham berhasil diperbarui.');
            return $this->redirect(['company/view', 'id' => $model->comp_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'company' => $model->company,
        ]);
    }

    /**
     * Menghapus pemegang saham.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = Shareholder::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Data pemegang saham tidak ditemukan.');
        }

        $compId = $model->comp_id;
        $model->delete();

        Yii::$app->session->setFlash('info', 'Pemegang saham telah dihapus.');
        return $this->redirect(['company/view', 'id' => $compId]);
    }
}
