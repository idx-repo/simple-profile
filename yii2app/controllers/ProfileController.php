<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\Company;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController mengelola CRUD profil detail perusahaan.
 */
class ProfileController extends Controller
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
     * Membuat atau menambahkan profil ke perusahaan tertentu.
     * @param int $comp_id ID perusahaan induk
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($comp_id)
    {
        $company = Company::findOne($comp_id);
        if (!$company) {
            throw new NotFoundHttpException('Perusahaan tidak ditemukan.');
        }

        // Cek jika profil sudah ada, alihkan ke update
        if ($company->profile) {
            return $this->redirect(['update', 'id' => $company->profile->id]);
        }

        $model = new Profile();
        $model->comp_id = $comp_id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Profil perusahaan berhasil disimpan.');
                return $this->redirect(['company/view', 'id' => $model->comp_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'company' => $company,
        ]);
    }

    /**
     * Memperbarui profil perusahaan.
     * @param int $id ID profil
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Profile::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Profil tidak ditemukan.');
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Profil perusahaan berhasil diperbarui.');
            return $this->redirect(['company/view', 'id' => $model->comp_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'company' => $model->company,
        ]);
    }

    /**
     * Menghapus profil perusahaan.
     * @param int $id ID profil
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = Profile::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Profil tidak ditemukan.');
        }

        $compId = $model->comp_id;
        $model->delete();

        Yii::$app->session->setFlash('info', 'Profil perusahaan telah dihapus.');
        return $this->redirect(['company/view', 'id' => $compId]);
    }
}
