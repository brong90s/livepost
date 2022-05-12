<?php

namespace Database\Factories\Helpers;

class FactoryHelper
{
  /**
   * This function will get a random model id from the database
   * @param string | HasFactory $model
   */
  public static function getRandomModelId(string $model)
  {
    // get the model count
    $count = $model::query()->count();

    if ($count === 0) {
      // if model count is 0
      // we should create a new record and retrieve the record id
      // ** the create() method : will return us the newly created modal instance.
      return $model::factory()->create()->id;
    } else {
      // generate a random number between 1 and model count
      return rand(1, $count);
    }
  }
}
