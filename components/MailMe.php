<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 30.12.2016
 * Time: 22:08
 */

namespace app\components;

use Yii;

class MailMe extends \yii\base\Component
{
    private $builder;

    const EVENT_REVIEW_SENT = 'reviewSent';
    const EVENT_SEMINAR_SENT = 'seminarSent';
    const EVENT_QUESTION_SENT = 'questionSent';

    function __construct()
    {
        $this->builder = \Yii::$app->mailer->compose()
            ->setFrom(\Yii::$app->params["siteEmail"]);

        // связка события отправки отзыва о семниаре // объект . метод
        $this->on(self::EVENT_REVIEW_SENT, [$this, 'reviewSentCallback']);

        // связка события отправки заявки на семинар
        $this->on(self::EVENT_SEMINAR_SENT, [$this, 'seminarSentCallback']);

        // связка события отправки вопроса
        $this->on(self::EVENT_QUESTION_SENT, [$this, 'questionSentCallback']);
    }

    public function reviewSentCallback($event) {
        $this->test('Добавлен новый отзыв о семинаре от ' . $event->model->name);
    }

    public function seminarSentCallback($event) {
        $this->test('Добавлена новая заявка на семинар ' . $event->model->name);
    }

    public function questionSentCallback($event) {
        $this->test('Добавлен новый вопрос о предстоящем семинаре от ' . $event->model->name);
    }

    public function test($message = 'Тестовое сообщение')
    {
        $result = $this->builder
            ->setTo(getenv("MAIL_TEST"), "***")
            ->setSubject('Заголовок')
            ->setHtmlBody($message)
            ->send();

        return $result;
    }
}