<?php

namespace app\controllers;

use Yii;
use app\models\Director;
use app\models\Company;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DirectorController mengelola data dewan direksi perusahaan.
 */
class DirectorController extends Controller
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
     * Menambahkan anggota dewan direksi.
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

        $model = new Director();
        $model->comp_id = $comp_id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Direktur berhasil ditambahkan.');
                return $this->redirect(['company/view', 'id' => $model->comp_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'company' => $company,
        ]);
    }

    /**
     * Memperbarui anggota dewan direksi.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Director::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Direktur tidak ditemukan.');
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Data direktur berhasil diperbarui.');
            return $this->redirect(['company/view', 'id' => $model->comp_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'company' => $model->company,
        ]);
    }

    /**
     * Menghapus anggota dewan direksi.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = Director::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Direktur tidak ditemukan.');
        }

        $compId = $model->comp_id;
        $model->delete();

        Yii::$app->session->setFlash('info', 'Direktur telah dihapus.');
        return $this->redirect(['company/view', 'id' => $compId]);
    }
}
