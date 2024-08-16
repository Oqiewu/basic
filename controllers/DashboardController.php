<?php

namespace app\controllers;

use Yii;
use app\models\Contact;
use app\models\Deal;
use yii\web\Controller;

class DashboardController extends Controller
{
    public function actionIndex()
    {
        $selectedType = Yii::$app->request->get('type', 'contact');
        $selectedId = Yii::$app->request->get('id');

        $contacts = Contact::find()->all();
        $deals = Deal::find()->all();

        $selectedItem = null;
        if ($selectedType === 'contact' && $selectedId) {
            $selectedItem = Contact::findOne($selectedId);
        } elseif ($selectedType === 'deal' && $selectedId) {
            $selectedItem = Deal::findOne($selectedId);
        }

        return $this->render('index', [
            'contacts' => $contacts,
            'deals' => $deals,
            'selectedType' => $selectedType,
            'selectedItem' => $selectedItem,
        ]);
    }

    public function actionGetContent()
    {
        $selectedType = Yii::$app->request->get('type');
        $selectedId = Yii::$app->request->get('id');
    
        $content = '';
    
        if ($selectedType === 'contact' && $selectedId) {
            $contact = Contact::findOne($selectedId);
            if ($contact) {
                $content = $this->renderPartial('_contact_content', ['contact' => $contact]);
            }
        } elseif ($selectedType === 'deal' && $selectedId) {
            $deal = Deal::findOne($selectedId);
            if ($deal) {
                $content = $this->renderPartial('_deal_content', ['deal' => $deal]);
            }
        }
    
        return $content;
    }
    

}
