<?php

class JSONView extends View
{
    private mixed $data;
    public function __construct(mixed $data)
    {
        $this->data = $data;
    }

    public function render(): void
    {
        echo json_encode($this->data);
    }
}

