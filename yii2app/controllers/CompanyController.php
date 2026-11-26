<?php

namespace app\controllers;

use Yii;
use app\models\Company;
use app\models\CompanySearch;
use app\models\Shareholder;
use app\models\Commissioner;
use app\models\Director;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * CompanyController mengimplementasikan operasi CRUD dan Master-Detail untuk model Company.
 */
class CompanyController extends Controller
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
     * Menampilkan daftar seluruh perusahaan emiten.
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Menampilkan tampilan Master-Detail interaktif berbasis Bootstrap 4 Tabs.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModelWithRelations($id);

        $shareholdersProvider = new ActiveDataProvider([
            'query' => Shareholder::find()->where(['comp_id' => $id]),
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['shares' => SORT_DESC]],
        ]);

        $commissionersProvider = new ActiveDataProvider([
            'query' => Commissioner::find()->where(['comp_id' => $id]),
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['id' => SORT_ASC]],
        ]);

        $directorsProvider = new ActiveDataProvider([
            'query' => Director::find()->where(['comp_id' => $id]),
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['id' => SORT_ASC]],
        ]);

        return $this->render('view', [
            'model' => $model,
            'profile' => $model->profile,
            'shareholdersProvider' => $shareholdersProvider,
            'commissionersProvider' => $commissionersProvider,
            'directorsProvider' => $directorsProvider,
        ]);
    }

    /**
     * Membuat data perusahaan baru.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Company();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', "Perusahaan [{$model->code}] {$model->name} berhasil ditambahkan.");
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Memperbarui data perusahaan.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Data perusahaan [{$model->code}] berhasil diperbarui.");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Menghapus perusahaan beserta entitas terkait.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $code = $model->code;

        // Hapus entitas anak terkait
        Shareholder::deleteAll(['comp_id' => $id]);
        Commissioner::deleteAll(['comp_id' => $id]);
        Director::deleteAll(['comp_id' => $id]);
        if ($model->profile) {
            $model->profile->delete();
        }

        $model->delete();

        Yii::$app->session->setFlash('info', "Perusahaan [{$code}] beserta seluruh data terkait telah dihapus.");
        return $this->redirect(['index']);
    }

    /**
     * Mencari model Company berdasarkan primary key dengan eager loading.
     * @param int $id
     * @return Company
     * @throws NotFoundHttpException
     */
    protected function findModelWithRelations($id)
    {
        if (($model = Company::find()->where(['id' => $id])->with(['profile', 'shareholders', 'commissioners', 'directors'])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Perusahaan yang diminta tidak ditemukan.');
    }

    /**
     * Mencari model Company berdasarkan primary key.
     * @param int $id
     * @return Company
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Perusahaan yang diminta tidak ditemukan.');
    }
}
