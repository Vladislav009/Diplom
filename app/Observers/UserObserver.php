<?php
namespace App\Observers;

use App\Question;

class UserObserver
{
  /**
   * Прослушивание события редактирования вопроса.
   *
   * @param  Question $question
   * @return void
   */
  public function updating(Question $question)
  {
       if (isset($question->body) & $question->isPublished == '1') {
           $question->status = 'Опубликован';
       }elseif (isset($question->body) & $question->isPublished == '2') {
          $question->status = 'Скрыт';
      }else{
           $question->status = 'Без ответа';
       }

  }
}
