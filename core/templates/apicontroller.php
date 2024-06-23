<?php

use core\render;
use core\request;

final class %module%Controller
{

  use request;

  public function GET_index()
  {
    render::json()->message('My Get_index method')->out();
  }

  public function POST_index()
  {
    render::json()->message($this->json())->out();
  }
}
