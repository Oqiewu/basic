<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Contact;
use app\models\Deal;
use Faker\Factory;

class GenerateDataController extends Controller
{
    public function actionIndex($numContacts = 10, $numDeals = 10)
    {
        $faker = Factory::create();
        $this->generateContacts($numContacts, $faker);
        $this->generateDeals($numDeals, $faker);
    }

    private function generateContacts($num, $faker)
    {
        for ($i = 0; $i < $num; $i++) {
            $contact = new Contact();
            $contact->first_name = $faker->firstName;
            $contact->last_name = $faker->lastName;
            $contact->save();
        }
        echo "Contacts generated: $num\n";
    }

    private function generateDeals($num, $faker)
    {
        $contacts = Contact::find()->all();
        foreach ($contacts as $contact) {
            for ($i = 0; $i < $num; $i++) {
                $deal = new Deal();
                $deal->name = $faker->word;
                $deal->amount = $faker->numberBetween(100, 10000);
                $deal->contact_id = $contact->id;
                $deal->save();
            }
        }
        echo "Deals generated for each contact: $num\n";
    }
}
