<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['dashboard'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        // 'actions' => ['index','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
//                    [
//                       'actions' => ['dashboard'],
//                        'allow' => false,
//                        'roles' => ['@'],
//                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'icon' => 'fa fa-info',
                    'message' => 'Check your email for further instructions.',
                    'title' => 'Request Reset Password',
                ]);
                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'error',
                    'icon' => 'fa fa-info',
                    'message' => 'Sorry, we are unable to reset password for the provided email address.',
                    'title' => 'Request Reset Password',
                ]);
            }
        }
        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {

            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'icon' => 'fa fa-info',
                'message' => 'New Password saved.',
                'title' => 'Reset Password',
            ]);
            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionDashboard() {

//        $dataCacah = new ActiveDataProvider([
//            'query' => \backend\models\MitraPencacahan::find()->limit(3),
//            'sort' => [
//                'defaultOrder' => [
//                    'nilai' => SORT_DESC,
//                ]],
//            'pagination' => [
//                'pageSize' => 1,
//            ],
//        ]);
//        $dataOlah = new ActiveDataProvider([
//        'query' => \backend\models\MitraPengolahan::find()->limit(3),
//        'sort' => [
//        'defaultOrder' => [
//        'nilai' => SORT_DESC,
//        ]
//        ],
//        'pagination' => [
//                'pageSize' => 1,]
//        ]);
//                 return $this->render('dashboard', [
//                    'dataCacah' => $dataCacah,
//                    'dataOlah' => $dataOlah,
//        ]);
                 return $this->render('build', [
        ]);
    }

}
