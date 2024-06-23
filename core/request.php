<?php

namespace core;

trait request
{

    /**
     * Getting json body
     */
    private function json(): array|bool
    {

        $data = json_decode(file_get_contents('php://input'), true);
        if ($data) {
            return $data;
        }

        render::json(400)->message('A JSON is expected')->out();
        return false;
    }
}
