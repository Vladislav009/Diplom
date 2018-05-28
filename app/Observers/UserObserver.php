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
       if (isset($question->body)) {
           $question->status = 'Опубликован';
       }else{
           $question->status = 'Без ответа';
       }

  }
}
